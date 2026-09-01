<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WholesaleCustomers extends Model
{
    use HasFactory;
    protected $table = 'wholesale_customers';
    protected $fillable = [
        'customer_id',
        'priority_level',
    ];
}
