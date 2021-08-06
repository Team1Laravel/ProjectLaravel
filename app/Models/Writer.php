<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Writer extends Model
{
    use SoftDeletes;
    use HasFactory;
    public function movie() {
        return $this->hasMany("App\Model\Movie");
    }
}
