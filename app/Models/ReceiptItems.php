<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptItems extends Model
{
    use HasFactory;
    protected $table = 'receipt_items';
    protected $fillable = [
        'receipt_id',
        'item_id',
        'i_name',
        'date',
        'quantity',
        'discount',
        'subtotal',
        
    ];
}
