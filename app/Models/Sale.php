<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function saveSale($request)
    {
        $sale                   = new $this;
        $sale->customer_id      = $request->customer_id;
        $sale->rate             = $request->rate;
        $sale->weight           = $request->weight;
        $sale->remaining_weight = $request->weight;
        $sale->save();
    }
}
