<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    protected $table = "items";
    protected $fillable = [
        'serial_number',
        'barcode',
        'name',
        'type',
        'color',
        'price',
        'height',
        'width',
        'brand_id',
    ];
public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
  
}
