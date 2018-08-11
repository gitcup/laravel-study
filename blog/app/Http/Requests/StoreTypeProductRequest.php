<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeProductRequest extends FormRequest
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
            'name' => 'required',
        
        ];
    }

    public function messages() {
        return [
            'name.required' => 'กรุณากรอกชื่อสินค้า',
        
        ];
    }
}
