<x-mail::message>
Hệ thống đã nhận một phản hồi từ khách hàng. <br>
<br>
Thông tin khách hàng:
<br>
- Họ và Tên: {{$fullname}}<br>
- Email: {{$email}}<br>
- Số điện thoại: {{$phone}}<br>
<br>
Tiêu đề:  <strong>{{$subject}}</strong><br>
Nội dung: <strong>{{$message}}</strong> <br>


Trân trọng,<br>
{{ config('app.name') }}
</x-mail::message>
