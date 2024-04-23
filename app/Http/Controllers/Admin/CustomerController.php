<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sale;

class CustomerController extends Controller
{
    /*
    * Customer : Display resources
    *
    * comments:
    */
    public function index()
    {
        return view('admin.pages.customer.list');
    }

    /*
    * Customer : Listing
    *
    * comments:
    */
    public function list(Request $request)
    {
        extract($this->DTFilters($request->all()));

        $customers = Customer::orderBy('id', 'DESC');
         
        if (!empty($search)) {
            $customers->where(function ($query) use ($search) {
                $query->orWhere('name','like', "%{$search}%")
                      ->orWhere('email','like', "%{$search}%")
                      ->orWhere('address','like', "%{$search}%");
            });
        }

        $count = (clone $customers)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = array();

        $customers->orderBy($sort_column, 'DESC')->offset($offset)->limit($limit);
        $customers = $customers->get();

        foreach ($customers as $key => $customer) {

            $customerSale = count($customer->sales) > 0 ? true : false;
            $remainingWeight = $customer->sales->sum('remaining_weight');
            $totalWeight = $customer->sales->sum('weight');

            $records['data'][] = [
                'id' => $key + 1,
                'name' => isset($customer->name) ? ucwords($customer->name) : '-',
                'email' => isset($customer->email) ? $customer->email : '-',
                'phone_number' => isset($customer->phone_number) ? $customer->phone_number : '-',
                'address' => isset($customer->address) ? $customer->address : '-',
                'remaining_weight' => isset($remainingWeight) ? $remainingWeight : '-',
                'weight' => isset($totalWeight) ? $totalWeight : '-',
                'action' => view('admin.shared.action')->with(['id' => $customer->id, 'routeName' => 'customer', 'view' => true, 'customerSale' => $customerSale])->render(),
            ];
        }

        return $records;
    }

    /*
    * Customer : payment
    *
    * comments:
    */
    public function payment($id)
    {
        $customer = Customer::where('id', $id)->with('sales')->first();

        return view('admin.pages.payment.list', compact('customer'));
    }

    /*
    * Customer : Sale Listing
    *
    * comments:
    */
    public function saleList(Request $request, $id)
    {
        extract($this->DTFilters($request->all()));

        $sales = Customer::where('id', $id)->with('sales');
        
        $count = (clone $sales)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = array();

        $sales->orderBy($sort_column, 'DESC')->offset($offset)->limit($limit);
        $sales = $sales->first();

        foreach ($sales->sales as $key => $sale) {
            $records['data'][] = [
                'id' => $key + 1,
                'customer_name'    => isset($sale->customer) ? ucwords($sale->customer->name) : '-',
                'rate'             => isset($sale->rate) ? $sale->rate : '-',
                'weight'           => isset($sale->weight) ? $sale->weight : '-',
                'remaining_weight' => isset($sale->remaining_weight) ? $sale->remaining_weight ?? 0 : '-',
            ];
        }

        return $records;
    }

    public function paymentSave(Request $request)
    {
        $customer = Customer::where('id', $request->customer_id)->with('sales')->first();

        foreach ($request->rate as $key => $rate) {
            $sale = Sale::where('customer_id', $request->customer_id)->where('payment_status', 'pending')->where('rate', $rate)->first();

            if ($sale !== null) {

                $oldRemainingWeight = $sale->remaining_weight !== null ? $sale->remaining_weight : $sale->weight;
                $newRemainingWeight = $oldRemainingWeight - $request->weight[$key];
                if ($oldRemainingWeight !== 0) {
                    $sale->remaining_weight =  $newRemainingWeight;
                }
                if ($newRemainingWeight == 0) {
                    $sale->payment_status = 'complate';
                }

                $sale->save();
            }

        }

        return redirect()->route('customer.view', $customer->id);
    }

    public function checkRemainingWeight(Request $request)
    {
        $sale = Sale::where('customer_id', $request->customer_id)->where('rate', $request->rate)->first();
        $weight = $sale->remaining_weight == 0 ? $sale->weight : $sale->remaining_weight;
        if($weight < $request->weight){

            return response()->json(['status' => false,'title' => "Remaining Weight Exceeds", 'message' => "Your entered weight is more than our existing weight. Available weight quantities are '$weight' gm.", 'weight'=> $weight]);

        }
    }
    
}
