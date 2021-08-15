<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         // tạo thủ tục 1
         DB::statement('create proc a()');
         // tạo thủ tục 2
         DB::statement('create proc b()');
         */
        Schema::table('books', function (Blueprint $table){
            $table->foreignId('category_id');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table){
            $table->dropColumn('category_id');
        });
    }
}
