<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Books extends Model {

    protected $table = 'books'; //กำหนดชื􀀮อตารางในฐานข้อมูล
    protected $fillable = ['title', 'price', 'typebooks_id']; //กำหนดให้สามารถเพ􀀮ิมข้อมูลได้ในคำสง􀀮ั

//เดียว Mass Assignment

    public function typebooks() {
        return $this->belongsTo(TypeBooks::class, 'typebooks_id'); //กำหนด FK ด้วย
    }

}
