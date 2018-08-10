<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up() {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id'); //รหัสหนังสือ
            $table->string('title'); //ช􀀡ือหนังสือ
//            $table->string('product_name'); //ช􀀡ือหนังสือ
            $table->decimal('price', 10, 2); //ราคา
            $table->integer('typeproduct_id')->unsigned();
            $table->foreign('typeproduct_id')->references('id')->on('typeproduct');
            $table->string('image'); //เก็บช􀀡ือภาพหนังสอื
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
