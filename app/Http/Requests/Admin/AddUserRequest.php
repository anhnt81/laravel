<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'username'  => 'required|unique:users',
            'email' => 'email',
            'phone' => 'required',
            'pass'   => 'required|min:8|max:16',
            'repass' => 'required|same:pass',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required'  => 'Username không được bỏ trống',
            'username.unique'    => 'Username đã tồn tại',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'pass.required'   => 'Mật khẩu không được bỏ trống',
            'pass.min'        => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'pass.max'        => 'Mật khẩu chỉ được phép tối đa 16 ký tự',
            'repass.required' => 'Hãy nhập lại mật khẩu',
            'repass.same'     => 'Mật khẩu nhập lại không khớp'
        ];
    }
}
