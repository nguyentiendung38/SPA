@component('mail::message')
# Yêu cầu đặt lại mật khẩu

Chúng tôi nhận được yêu cầu đặt lại mật khẩu từ bạn. Nhấn vào nút bên dưới để đặt lại mật khẩu:

@component('mail::button', ['url' => $actionUrl])
Đặt lại mật khẩu
@endcomponent

Nếu bạn không yêu cầu, vui lòng bỏ qua email này.

Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!<br>
@endcomponent
