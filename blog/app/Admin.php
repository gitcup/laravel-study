<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{


    protected $table = 'users'; //กำหนดชื􀀮อตารางในฐานข้อมูล
    protected $fillable = [ 'username','name','lastname','image_user', 'email', 'password', 'phone_number']; //กำหนดให้สามารถเพ􀀮ิมข้อมูลได้ในคำสง􀀮ั

 public function admin() {
        return $this->hasOne(user::class, 'id'); //PK ของตาราง Users
    }
    
  

}
