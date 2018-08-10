<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'product'; //กำหนดชื􀀮อตารางในฐานข้อมูล
    protected $fillable = ['title', 'price', 'typeproduct_id']; //กำหนดให้สามารถเพ􀀮ิมข้อมูลได้ในคำสง􀀮ั

//เดียว Mass Assignment

    public function typeproduct() {
        return $this->belongsTo(TypeProduct::class, 'typeproduct_id'); //กำหนด FK ด้วย
    }

}
