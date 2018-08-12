<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //หน้าแรก
        public function index() {
        $admin = User::with('user')->orderBy('id', 'desc')->paginate(5); //controller books
        return view('admin/index', ['admin' => $admin]);
    }
    //เพิ่มข้อมูล
    public function create() {
        return view('admin.create');
    }
    
    
    
}
