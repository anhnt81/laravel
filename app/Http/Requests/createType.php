<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createType extends FormRequest
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
    public function rules()
    {

        return [
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|image|max:20480'
        ];
    }
    public function attributes()
    {

        return [
            'name' => 'Tên người dùng',
            'description' => 'Mô Tả',
            'image' => 'Ảnh'
        ];
    }
    public function customMessages()
    {

        return [
            'name.required' => 'Tên phải bắt buộc nhập',
            'description.required' => 'Phải Có Mô Tả',
            'image.image' => 'Ảnh không hợp lệ',
            'image.required' => 'Bạn phải có ảnh',
            'image.max' => 'Dung lượng không cho phép'
        ];
    }
}
