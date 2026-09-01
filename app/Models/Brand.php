<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = "brands";
    protected $fillable = [
        'name',
        'location',
        'v_of_items',
        'phone_number',
        'email',
        'registration_no'
    ];
    public function items()
    {
        return $this->hasMany(Items::class);
    }

}
