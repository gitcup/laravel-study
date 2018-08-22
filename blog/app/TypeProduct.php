<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $table = 'typeproduct'; //กำหนดชื􀀮อตารางให้ตรงกับฐานข้อมูล
    protected $fillable = ['name']; //กำหนดให้สามารถเพ􀀮ิมข้อมูลได้ในคำสง􀀮ั
    
    public function product() {
        return $this->hasMany(Product::class); //กำหนดความสัมพันธ์รูปแบบ One To Many ไปยังตาราง product
    }
}
