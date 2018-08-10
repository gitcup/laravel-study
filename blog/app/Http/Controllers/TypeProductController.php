<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TypeProduct;//นำเอาโมเดล TypeProduct เข้ามาใช้งาน
class TypeProductController extends Controller
{
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
public function destroy($id) {
//TypeProduct::find($id)->delete();
TypeProduct::destroy($id);
return back();
}
}