<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sale;

class SaleController extends Controller
{
    /*
    * Sale : Display resources
    *
    * comments:
    */
    public function index()
    {
        return view('admin.pages.sales.list');
    }

    /*
    * Sale : Listing
    *
    * comments:
    */
    public function list(Request $request)
    {
        extract($this->DTFilters($request->all()));

        $sales = Sale::orderBy('id', 'DESC');
         
        if (!empty($search)) {
            $sales->where('id', "like", "%".$search."%");
            $sales->orWhere('weight', "like", "%".$search."%");
            $sales->orWhere('rate', "like", "%".$search."%");
            $sales->orWhereHas('customer',function($query) use ($search){
               $query->where('name', "like", "%".$search."%");
            });
        }

        $count = (clone $sales)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = array();

        $sales->orderBy($sort_column, 'DESC')->offset($offset)->limit($limit);
        $sales = $sales->get();

        foreach ($sales as $key => $sale) {
            $records['data'][] = [
                'id' => $key + 1,
                'customer_name' => isset($sale->customer) ? ucwords($sale->customer->name) : '-',
                'weight'        => isset($sale->weight) ? $sale->weight : '-',
                'rate'          => isset($sale->rate) ? $sale->rate : '-',
            ];
        }

        return $records;
    }


    /*
    * sale : create
    *
    * comments:
    */
    public function create()
    {
        $customers = Customer::where('is_active', '1')->get(['id', 'name']);

        return view('admin.pages.sales.add', compact('customers'));
    }

    /*
    * sale : save
    *
    * comments:
    */
    public function save(Request $request)
    {
        (new Sale())->saveSale($request);

        return redirect()->route('sale');
    }

}
