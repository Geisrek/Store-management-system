<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesMan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sales_man';
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'phone_number',
        'password',
        'works_in'
    ];
}
