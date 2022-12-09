<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminTin extends FormRequest
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
                'tieuDe' => 'required | min:10',
                'tomTat' => 'required|max:255',
                'noiDung' => 'required',
                'image' =>[
                    'required',
                    'image',
                    'mimes:jpeg,png',
                    'mimetypes:image/jpeg,image/png',
                    'max:3072',
                ]
                ];
    }
    public function messages()
    {
        return [
                'tieuDe.required' => 'Buộc nhập tiêu đề',
                'tieuDe.min' => 'Tiêu đề tối thiểu 10 ký tự',
                'tomTat.required' => 'Buộc nhập tóm tắt',
                'tomTat.max' => 'Tóm tắt không quá 255 ký tự',
                'noiDung.required' => 'Buộc nhập nội dung',
                'image.required' => 'Buộc có hình ảnh',
                'image.image' => 'Bạn chỉ được tải hình ảnh',
                'image.mimes' => 'Hình ảnh dạng jpeg và png',
                'image.max' => 'Ảnh tối đa được nặng 3MB',
        ];
    }
}
