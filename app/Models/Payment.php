<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    public $timestamps = false;
    public $table ="payment";
    protected $fillable = [
        'user_id',
        'package_id',
        'cardnumber',
        'name',
        'expires',
        'CVC',
        'created_at'
    ];
}
