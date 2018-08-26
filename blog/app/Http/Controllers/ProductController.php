<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; // อย่าลืม use model product เข้ามาใช้
use Image; //เรียกใช้ library จัดการรูปภาพเข้ามาใช้งาน
use App\Http\Requests\StoreProductRequest; //ตรวจสอบความถูกต้อง
use File; //เรียกใช้ library จัดการไฟล์เข้ามาใช้งาน

class ProductController extends Controller {

    //กำหนดสิทธิ์
    public function __construct() {
        $this->middleware('auth', ['except' => ['index']]);
        //$this->middleware('auth', ['except' => ['index', 'create', 'store']]);
    }

    //ผู้ใช้จะไม่สามารถเข้าถึงเมธอดอ􀀮ืนๆ ใน ProductController ได้ ยกเว้นเมธอด index

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $product = Product::with('typeproduct')->orderBy('id', 'asc')->paginate(5);
        return view('product/index', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request) {
        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->typeproduct_id = $request->typeproduct_id;
        if ($request->hasFile('image')) {
            $filename = str_random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/images/', $filename);
            Image::make(public_path() . '/images/' . $filename)->resize(50, 50)->save(public_path() . '/images/resize/' .
                    $filename);
            $product->image = $filename;
        } else {
            $product->image = 'nopic.jpg';
        }
        $product->save();

        //sweet alert
        $request->session()->flash('status', 'บันทึกข้อมูลเรียบร้อยแล้ว');
//กำหนด key ของ flash data ช􀀡ือว่า status โดยใส่ค่าข้อมูลคำว่า บนั ทึกข้อมูลเรียบร้อยแล้ว
        return back();
//return redirect()->action('ProductController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $product = Product::findOrFail($id);

        return view('product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id) {
        $requestData = $request->all();
        $post = Product::findOrFail($id);

        $pathToStore = public_path('images');

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
                    $image = Image::make(sprintf($pathToStore . '/%s', $picture))->resize(600, 531)->save($pathToStore . '/resize/' . $picture);
                }
            }

            $requestData['image'] = "{$picture}";
        }

        $post->update($requestData);
        $request->session()->flash('status', 'สำเร็จ');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::find($id);
        if ($product->image != 'nopic.jpg') {
            File::delete(public_path() . '\\images\\' . $product->image);
            File::delete(public_path() . '\\images\\resize\\' . $product->image);
        }
        $product->delete();
        return redirect()->action('ProductController@index');
    }

}
