<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name', 'name', 'email', 'phone_number', 'address',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}