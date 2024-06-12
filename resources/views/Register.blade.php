<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .registration-form {
            background-color: #ffd700;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
        }
        .header {
            text-align: center;
            color: #003366;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-size: 14px;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"],
        select {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            padding: 10px;
            background-color: #003366;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #002244;
        }
    </style>
</head>
<body>
    <div class="registration-form">
        <div class="header">
            <h2>IIG VIỆT NAM TƯ VẤN MIỄN PHÍ</h2>
            <p>LỘ TRÌNH HỌC TOEIC TỪ A-Z</p>
        </div>
        <form action="{{ route('TestOnline') }}" method="post">
            @csrf
            <label for="name">Họ và Tên*</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email*</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mật khẩu*</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Xác nhận mật khẩu*</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <label for="phone">Số điện thoại* (Nhập chính xác)</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="target">Mục tiêu TOEIC</label>
            <select id="target" name="target">
                <option value="400">400</option>
                <option value="500">500</option>
                <option value="600">600</option>
                <option value="700">700</option>
                <option value="800">800</option>
                <option value="900">900</option>
            </select>

            <button type="submit">Đăng Ký Test</button>
        </form>
    </div>
</body>
</html>
