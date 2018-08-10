<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
      /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
       return true; //หากกำหนดเป็น false จะต้องล็อกอินก่อน
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title' => 'required',
            'price' => 'required',
            'typeproduct_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'กรุณากรอกชื่อสินค้า',
            'price.required' => 'กรุณากรอกราคา',
            'typeproduct_id.required' => 'กรุณาเลือกหมวดสินค้า',
            'image.mimes' => 'กรุณาเลือกไฟล์ภาพนามสกุล jpeg,jpg,png',
        ];
    }
}
