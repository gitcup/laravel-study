<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Http\Request;
use Image; //เรียกใช้ library จัดการรูปภาพเข้ามาใช้งาน
use App\Http\Requests\AdminRequest; //ตรวจสอบความถูกต้อง
use File; //เรียกใช้ library จัดการไฟล์เข้ามาใช้งาน
class AdminController extends Controller
{
    //หน้าแรก
        public function index() {
        $admin = Admin::with('admin')->orderBy('id', 'desc')->paginate(5); //controller admins
        return view('admin/index', ['admin' => $admin]);
    }
    //เพิ่มข้อมูล
    public function create() {
        return view('admin.create');
    }
    
    //ลบ
//    public function destroy($id) {
//        $admin = Admin::find($id);
//        if ($admin->image_user != 'nopic.jpg') {
//            File::delete(public_path() . '\\images\\admin' . $admin->image_user);
//            File::delete(public_path() . '\\images\\resize\\admin' . $admin->image_user);
//        }
//        $admin->delete();
//        return redirect()->action('AdminController@index');
//    }
//    
    //เพิ่มข้อมูล พร้อมตรวจสอบข้อมูล
     public function store(AdminRequest $request) {
        $admin = new Admin();
        $admin->username = $request->username;
        $admin->name = $request->name;
        $admin->lastname = $request->lastname;
        $admin->email = $request->email;
        $admin->password = $request->password;
         $admin->phone_number = $request->phone_number;
         if ($request->hasFile('image_user')) {
            $filename = str_random(10) . '.' . $request->file('image_user')->getClientOriginalExtension();
            $request->file('image_user')->move(public_path() . '/images/admin/', $filename);
            Image::make(public_path() . '/images/admin/' . $filename)->resize(50, 50)->save(public_path() . '/images/resize/admin/' .
                    $filename);
            
             $admin->image_user = $filename;
        } else {
             $admin->image_user = 'nopic.jpg';
        }
        $admin->save();

        //sweet alert
        $request->session()->flash('status', 'บันทึกข้อมูลเรียบร้อยแล้ว');
//กำหนด key ของ flash data ช􀀡ือว่า status โดยใส่ค่าข้อมูลคำว่า บนั ทึกข้อมูลเรียบร้อยแล้ว
        return back();
//return redirect()->action('BooksController@index');
    }
}
