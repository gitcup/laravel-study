<?php

namespace Laravel\Http\Controllers;

use Laravel\Admin;
use Illuminate\Http\Request;
use Image; //เรียกใช้ library จัดการรูปภาพเข้ามาใช้งาน
use Laravel\Http\Requests\AdminRequest; //ตรวจสอบความถูกต้อง
use File; //เรียกใช้ library จัดการไฟล์เข้ามาใช้งาน
use Illuminate\Support\Facades\Hash; //การเข้ารหัส password มาใช้
use DB; //อย่าลืมนำ DB เข้ามา
use Illuminate\Support\CollectionStdClass; //ยังไม่เข้าใจตัวนี้
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    //หน้าแรก
    public function index() {
        $admin = Admin::where('user_type', '=', 'admin')->paginate(3);
        $admin2 = Admin::where('user_type', '=', 'officer_edit')->paginate(3); //controller admins
         $admin3 = Admin::where('user_type', '=', 'officer_view')->paginate(3);
        return view('admin/index', ['admin' => $admin,'admin2' => $admin2,'admin3' => $admin3]);
        
//        if (strtolower(Auth::user()->user_type) == 'admin') {
//            $admin = Admin::with('admin')->where('user_type', '=', 'admin')->paginate(3); //เมื่อ user_type = admin
//            return view('admin/index', ['admin' => $admin]);
////            return redirect('/');
//        } else if (strtolower(Auth::user()->user_type) == 'officer_edit') {
//            $admin = Admin::with('admin')->where('user_type', '=', 'officer_edit')->paginate(3); //เมื่อ user_type = officer_edit
//            return view('admin/index', ['admin' => $admin]);
//        } else {
//            strtolower(Auth::user()->user_type) == 'officer_view';
//            $admin = Admin::with('admin')->where('user_type', '=', 'officer_view')->paginate(3); //เมื่อ user_type = officer_view
//            return view('admin/index', ['admin' => $admin]);
//        }
    }

    //เพิ่มข้อมูล
    public function create() {
        return view('admin.create');
    }

    // ลบ
    public function destroy($id) {
        $admin = Admin::find($id);
        if ($admin->image_user != 'nopic.jpg') {
            File::delete(public_path() . '\\images\\admin' . $admin->image_user);
            File::delete(public_path() . '\\images\\resize\\admin' . $admin->image_user);
        }
        $admin->delete();
        return redirect()->action('AdminController@index');
    }

    //เพิ่มข้อมูล พร้อมตรวจสอบข้อมูล
    public function store(AdminRequest $request) {
        $admin = new Admin();
        $admin->username = $request->username;
        $admin->name = $request->name;
        $admin->lastname = $request->lastname;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->password = Hash::make($request);
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

    //แก้ไข
    public function edit($id) {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', ['admin' => $admin]);
    }

    public function update(AdminRequest $request, $id) {
        $admin = Admin::find($id);
        /* $book->title = $request->title;
          $book->price = $request->price;
          $book->typebooks_id = $request->typebooks_id;
          $book->save(); */
        $admin->update($request->all()); //mass asignment , define $fillable (model)
        return redirect()->action('AdminController@index');
    }

}
