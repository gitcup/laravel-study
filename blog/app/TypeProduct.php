<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $table = 'typeproduct'; //กำหนดชื􀀮อตารางให้ตรงกับฐานข้อมูล

    public function product() {
        return $this->hasMany(Product::class); //กำหนดความสัมพันธ์รูปแบบ One To Many ไปยังตาราง product
    }
}
