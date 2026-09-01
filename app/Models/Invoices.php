<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'invoices';
    protected $fillable = [
        'total_price',
        'paid',
        'owes',
    ];
}
