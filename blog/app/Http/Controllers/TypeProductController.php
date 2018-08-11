<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeProduct; //นำเอาโมเดล TypeProduct เข้ามาใช้งาน
use App\Http\Requests\StoreTypeProductRequest; //ตรวจสอบความถูกต้อง
use DB; //อย่าลืมนำ DB เข้ามา

class TypeProductController extends Controller {

    public function index() {
        $typeproducts = TypeProduct::all(); //แสดงข้อมูลทัง􀀪 หมด
//$typeproducts = TypeProduct::orderBy('id','desc')->get(); //แสดงข้อมูลทัง􀀪 หมดเรียงจากมากไปน้อยโดยใช้ id
        $count = TypeProduct::count(); //นับจำนวนแถวทัง􀀪 หมด
//แบ่งหน้า
        $typeproducts = TypeProduct::simplePaginate(3);
//$typeproducts = TypeProduct::paginate(3);
        return view('typeproduct.index', [
            'typeproducts' => $typeproducts,
            'count' => $count
        ]); // ส่งไปที􀀮 views โฟลเดอร์ typeproducts ไฟล์ index.blade.php
    }

    public function store(StoreTypeProductRequest $request) {
        $typeproduct = $request->input('name');
        DB::insert('insert into typeproduct (name) values(?)', [$typeproduct]); //ใช้ DB
       

        //sweet alert
        $request->session()->flash('status', 'บันทึกข้อมูลเรียบร้อยแล้ว');
//กำหนด key ของ flash data ช􀀡ือว่า status โดยใส่ค่าข้อมูลคำว่า บนั ทึกข้อมูลเรียบร้อยแล้ว
        return back();
//return redirect()->action('BooksController@index');
    }

    public function create() {
        //เพิ่มข้อมูล
        return view('typeproduct.create');
    }

    public function destroy($id) {
//TypeProduct::find($id)->delete();
        TypeProduct::destroy($id);
        return back();
    }

}
