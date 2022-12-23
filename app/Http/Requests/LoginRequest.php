<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Fortify;

class LoginRequest extends FormRequest
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
            Fortify::username() => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => ':attribute không được bỏ trống',
            'email.email' => ':attribute chưa đúng định dạng',
            'password.required' => ':attribute không được bỏ trống',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Email',
            'password'=> 'Mật khẩu',
        ];
    }
}
