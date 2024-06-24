<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Reset CSS */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            width: 800px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
            font-size: 16px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .section-header h2 {
            color: #007bff;
            font-size: 24px;
        }

        .section-header a {
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .section-header a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .action-buttons a {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            margin-right: 10px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action-buttons a:last-child {
            margin-right: 0;
        }

        .action-buttons a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Admin Dashboard</h1>
            <p>Xem kết quả của từng người dùng và chỉnh sửa khóa học</p>
        </div>

        
        <div class="action-buttons">
            <a href="{{ route('admin.manage-results') }}">Quản lý kết quả</a>
            <a href="{{ route('admin.manage-courses') }}">Quản lý khóa học</a>
        </div>
    </div>
</body>

</html>
