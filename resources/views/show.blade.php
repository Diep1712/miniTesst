<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenlish</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #0045e8;
            padding: 20px 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .logo {
            display: inline-block;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        nav {
            display: inline-block;
            float: right;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-left: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        nav ul li a.search-icon {
            font-size: 18px;
        }

        nav ul li a.test-online {
            background-color: #32cd32;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
        }

        .hero {
            background-color: #0045e8;
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .breadcrumb {
            background-color: #f0f0f0;
            padding: 10px 0;
        }

        .breadcrumb .container {
            font-size: 14px;
        }

        .schedule {
            padding: 40px 0;
        }

        .schedule-header {
            text-align: center;
        }

        .schedule-content {
            text-align: center;
            margin-top: 20px;
        }

        .schedule-content img {
            width: 100%;
            max-width: 400px;
        }

        .schedule-content p {
            font-size: 18px;
            margin-top: 10px;
        }

        footer {
            background-color: #0045e8;
            padding: 20px 0;
            text-align: center;
        }

        .contact-icons a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #32cd32;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">Zenlish</div>
            <nav>
                <ul>
                    <li><a href="#">Về chúng tôi</a></li>
                    <li><a href="#">Khóa học</a></li>
                    <li><a href="#">Học viên</a></li>
                    <li><a href="#">Tài liệu TOEIC</a></li>
                    <li><a href="#" class="search-icon">🔍</a></li>
                    <li><a href="#" class="test-online">Test Online</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Khóa học : {{$course}} </h1> <!-- Placeholder for the course variable -->
        </div>
    </section>

    <section class="breadcrumb">
        <div class="container">
            <a href="#">Trang chủ</a> &gt; <span>Khóa học</span>
        </div>
    </section>

    <section class="schedule">
        <div class="container">
            <div class="schedule-header">
                <h2>Lịch Khai Giảng</h2>
            </div>
            <div class="schedule-content">
                <img src="https://i.ytimg.com/vi/o3F3hH-WTus/maxresdefault.jpg" alt="Lịch khai giảng các lớp TOEIC mới nhất">
                <p>Lịch khai giảng các lớp TOEIC tại Zenlish mới nhất</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="contact-icons">
            <a href="#">Messenger</a>
            <a href="#">Phone</a>
            <a href="#">Instagram</a>
            <a href="#">Notes</a>
        </div>
    </footer>
</body>
</html>
