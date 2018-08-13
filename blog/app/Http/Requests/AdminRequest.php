<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules() {
        return [
            'username' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'image_user' => 'mimes:jpeg,jpg,png',
        ];
    }

    public function messages() {
        return [
            
            'username.required' => 'กรุณากรอกชื่อผู้ใช้',
            'name.required' => 'กรุณากรอกชื่อจริง',
            'lastname.required' => 'กรุณากรอกนามสกุล',
            'email.required' => 'กรุณากรอกอีเมล',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'phone_number.required' => 'กรุณากรอกเบอร์โทร',
            'image_user.mimes' => 'กรุณาเลือกไฟล์ภาพนามสกุล jpeg,jpg,png',
        ];
    }
}
