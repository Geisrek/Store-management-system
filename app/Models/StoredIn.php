<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoredIn extends Model
{
    use HasFactory;
    protected $table = 'stored_in';
    protected $fillable = [
        'serial_number',
        'location',
        'amount',
    ];
    public function item()
    {
        return $this->hasMany(Items::class, 'serial_number', 'serial_number');
    }
}
