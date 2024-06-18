<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenlish Online Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #0045ad;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .nav {
            background-color: #0045ad;
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            align-items: center;
        }
        .nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-size: 16px;
        }
        .test-button {
            background-color: #00c853;
            padding: 10px 20px;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .footer {
            background-color: #0045ad;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Zenlish Online Test</h1>
    </div>
    <div class="nav">
        <div>
            <a href="#">VỀ CHÚNG TÔI</a>
            <a href="#">KHÓA HỌC</a>
            <a href="#">HỌC VIÊN</a>
            <a href="#">TÀI LIỆU TOEIC</a>
        </div>
        <button class="test-button" onclick="startTest({{ session('num_questions', 10) }})">TEST ONLINE</button>
    </div>
    <div style="padding: 20px;">
        <table>
            <thead>
                <tr>
                    <th>Cấp độ</th>
                    <th>Số buổi học</th>
                    <th>Thời gian học (Dự kiến)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Beginner (Sơ cấp 1)</td>
                    <td>30</td>
                    <td>10 tuần</td>
                </tr>
                <tr>
                    <td>High Beginner (Sơ cấp 2)</td>
                    <td>40</td>
                    <td>14 tuần</td>
                </tr>
                <tr>
                    <td>Low Intermediate (Trung cấp 1)</td>
                    <td>40</td>
                    <td>14 tuần</td>
                </tr>
                <tr>
                    <td>Intermediate (Trung cấp 2)</td>
                    <td>40</td>
                    <td>14 tuần</td>
                </tr>
                <tr>
                    <td>Low Advanced (Cao cấp 1)</td>
                    <td>40</td>
                    <td>14 tuần</td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top: 20px;">Điểm của bạn: {{ $count }}</p>
        <p>Khóa học phù hợp với bạn: {{ $course }}</p>
     <a href="{{ route('show-course', ['course' => $courseId]) }}">Xem chi tiết khóa học</a>
    </div>
    <div class="footer">
        <p>&copy; 2024 Zenlish Online Test. All rights reserved.</p>
    </div>
</body>
</html>
