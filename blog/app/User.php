<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model; //เปิดการใช้ model

class User extends Authenticatable {

    use Notifiable;

//    protected $table = 'users'; //กำหนดชื􀀮อตารางในฐานข้อมูล

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
  // เพิ่มความสัมพันธ์ของตาราง 1:1
    


}


