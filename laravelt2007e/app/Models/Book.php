<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    // khai báo các cột trong bảng có thể được save, create thông qua model
    protected $fillable = ['name', 'author', 'title', 'price', 'publish', 'category_id'];
    public $timestamps = false;
    
    // 1 book tương ứng 1 chuyên ngành
    public function ChuyenNganh(){
        return $this->belongsTo(Category::class, "category_id", "id");
    }
    
}
