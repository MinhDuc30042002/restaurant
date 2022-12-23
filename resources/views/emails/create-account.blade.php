@component('mail::message')
<h1>Xin chào {{$name}},</h1>
<h3>Tài khoản của bạn đã được khởi tạo, mật khẩu đăng nhập của bạn là: </h3><h2>{{$password}}</h2>
<h3>Chức vụ: {{$group}}</h3>
<br>
@component('mail::button', ['url' => env('APP_URL')])
Đăng nhập tại đây
@endcomponent

Trân trọng,<br>
{{ config('app.name') }}
@endcomponent
