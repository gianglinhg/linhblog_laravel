<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoaiTin extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required | min:5',
            'thutu' => 'required | unique:loaitin,thuTu,'.$id
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Tên loại buộc phải nhập',
            'name.min' => 'Tối thiểu 5 kí tự',
            'thutu.required' => 'Thứ tự buộc phải nhập',
            'thutu.unique' => 'Thứ tự không được trùng lặp'
        ];
    }
}