<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Image; //เรียกใช้ library จัดการรูปภาพเข้ามาใช้งาน
use App\Http\Requests\AdminRequest; //ตรวจสอบความถูกต้อง
use File; //เรียกใช้ library จัดการไฟล์เข้ามาใช้งาน
use Illuminate\Support\Facades\Hash; //การเข้ารหัส password มาใช้
use DB; //อย่าลืมนำ DB เข้ามา
use Illuminate\Support\CollectionStdClass; //ยังไม่เข้าใจตัวนี้
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Sessio;

class AdminController extends Controller {

    //หน้าแรก
    public function index() {
        $admin = Admin::where('user_type', '=', 'admin')->paginate(3);
        $admin2 = Admin::where('user_type', '=', 'officer_edit')->paginate(3); //controller admins
        $admin3 = Admin::where('user_type', '=', 'officer_view')->paginate(3);
        return view('admin/index', ['admin' => $admin, 'admin2' => $admin2, 'admin3' => $admin3]);

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
        $admin->user_type = $request->user_type;
        $admin->activity_user = Auth::user()->username; // เพิ่มข้อมูลคนที่แก้ไข
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

        $requestData = $request->all();

        $post = Admin::findOrFail($id);
        $post->activity_user = Auth::user()->username; // เพิ่มข้อมูลคนที่แก้ไข
        $post->touch(); //อัพเดทเวลา
        $pathToStore = public_path('images/admin');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $rules = array('file' => 'required|mimes:png,gif,jpeg'); // 'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = \Illuminate\Support\Facades\Validator::make(array('file' => $file), $rules);

            if ($validator->passes()) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = sha1($filename . time()) . '.' . $extension;
                $upload_success = $file->move($pathToStore, $picture);

                if ($upload_success) {
                    //if success, create thumb
                    $image = Image::make(sprintf($pathToStore . '/%s', $picture))->resize(600, 531)->save('images/' . '/resize/' . 'admin/' . $picture);
                }
            }

            $requestData['image_user'] = "{$picture}"; //image_user คือ คอลัมน์ใน DB
        }



        $post->update($requestData);

        $request->session()->flash('status', 'สำเร็จ');
        return back();
    }

}
