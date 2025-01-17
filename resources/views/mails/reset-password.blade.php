<!DOCTYPE html>
<html>

<head>
    <title>Mã xác thực quên Mật khẩu</title>
</head>

<body>
    <p>Xin chào {{ $admin->fullname }},</p>
    <p>Mã otp quên mật khẩu: <strong>{{ $otp }}</strong></p>
    <p>Mã này có hiệu lực trong 5 phút</p>
    <p>Nếu bạn không có yêu cầu khôi phục mật khẩu, vui lòng bỏ qua tin nhắn này</p>
    <p>Trân trọng,<br>BỆNH VIÊN THỐNG NHẤT</p>
</body>

</html>
