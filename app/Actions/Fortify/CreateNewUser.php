<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Partner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'firstname' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'gender' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'address' => ['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ],[
            'firstname.required' => 'Họ không được bỏ trống',
            'firstname.max' => 'Họ quá dài, tối đa :max kí tự',
            'lastname.max' => 'Tên quá dài, tối đa :max kí tự',
            'lastname.required' => 'Tên không được bỏ trống',
            'gender.required' => 'Giới tính không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Chưa đúng định dạng email',
            'email.max' => 'Email quá dài, tối đa :max kí tự',
            'email.unique' => 'Email đã được sử dụng',
            'phone_number.required' => 'Số điện thoại không được bỏ trống',
            'phone_number.numeric' => 'Phải là số',
            'phone_number.digits' => 'Số điện thoại chỉ được 10 số',
            'address.required' => 'Địa chỉ không được bỏ trống',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.confirmed' => 'Mật khẩu xác nhận không trùng khớp',

        ])->validate();
        $partner = Partner::create([
            'name' => $input['firstname'].' '.$input['lastname'],
            'phone' => $input['phone_number'],
            'email' => $input['email'],
            'address' => $input['address'],
        ]);
        return User::create([
            'name' => $input['firstname'].' '.$input['lastname'],
            'email' => $input['email'],
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'gender' => $input['gender'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'],
            'address' => $input['address'],
            'password' => Hash::make($input['password']),
            'partner_id' => $partner->id,
        ]);
    }
}
