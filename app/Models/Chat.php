<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public $timestamps = false;
   protected $fillable = [
       'author',
       'content', 
       'sendto',
       'isRead'
   ];
}
