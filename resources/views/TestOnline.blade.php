<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenlish Online Test</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f5f5f5; }
        .header { background-color: #0045ad; color: white; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .nav { background-color: #0045ad; display: flex; justify-content: space-between; padding: 10px 20px; }
        .nav a { color: white; text-decoration: none; margin-right: 20px; font-size: 16px; }
        .nav .test-button { background-color: #00c853; padding: 10px 20px; border: none; color: white; cursor: pointer; font-size: 16px; }
        .container { display: flex; margin: 20px; }
        .main-content { flex: 70%; padding-right: 20px; }
        .main-content h2 { color: #0045ad; font-size: 24px; }
        .tabs { display: flex; margin-bottom: 20px; }
        .tabs button { padding: 10px 20px; margin-right: 10px; border: none; cursor: pointer; font-size: 16px; }
        .tabs .active { background-color: #0045ad; color: white; }
        .test-card { background-color: white; padding: 20px; border: 1px solid #ddd; margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between; }
        .test-card img { width: 150px; }
        .test-card-info { flex: 1; padding-left: 20px; }
        .test-card-info h3 { margin: 0; font-size: 18px; }
        .test-card-info p { margin: 5px 0; color: #555; }
        .test-card-buttons { display: flex; flex-direction: column; }
        .test-card-buttons button { margin-bottom: 10px; padding: 10px 20px; border: none; cursor: pointer; font-size: 16px; color: white; background-color: #0045ad; }
        .sidebar { flex: 30%; padding-left: 20px; }
        .sidebar h3 { color: #0045ad; font-size: 20px; }
        .sidebar-item { background-color: white; padding: 10px; border: 1px solid #ddd; margin-bottom: 20px; }
        .footer { background-color: #00c853; color: white; text-align: center; padding: 10px; position: fixed; bottom: 0; width: 100%; font-size: 14px; }
        .sidebar {
    flex: 30%;
    padding-left: 20px;
}

.sidebar h3 {
    color: #0045ad;
    font-size: 20px;
}

.sidebar-item {
    background-color: white;
    padding: 10px;
    border: 1px solid #ddd;
    margin-bottom: 20px;
}

.sidebar-item label {
    font-size: 16px;
    margin-bottom: 5px;
}

.sidebar-item input[type="number"] {
    width: 100px;
    padding: 5px;
    font-size: 16px;
    border: 1px solid #ddd;
}

.sidebar-item button {
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    color: white;
    background-color: #0045ad;
    margin-top: 10px;
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
        <button class="test-button" onclick="startTest(10)">TEST ONLINE</button>
    </div>
    <div class="container">
        <div class="main-content">
            <h2>TEST ONLINE</h2>
            <div class="tabs">
                <button class="active">MINI TEST</button>
                <button>LUYỆN TẬP</button>
            </div>
            <div class="test-card">
                <img src="https://topicanative.edu.vn/wp-content/uploads/2020/06/trang-web-hoc-tieng-anh-online-uy-tin.jpeg" alt="Test Image">
                <div class="test-card-info">
                    <h3>TEST ĐẦU VÀO (10 câu)</h3>
                    <p>25591 lượt hoàn thành</p>
                    <p>29/06/2023 22:45</p>
                </div>
                <div class="test-card-buttons">
                    <button onclick="startTest(10)">Test ngay</button>
                    <button>Chọn từng part</button>
                </div>
            </div>
            <div class="test-card">
                <img src="https://png.pngtree.com/element_our/20190530/ourmid/pngtree-english-class-study-class-image_1260036.jpg" alt="Test Image">
                <div class="test-card-info">
                    <h3>TEST ĐẦU VÀO (20 câu)</h3>
                    <p>8938 lượt hoàn thành</p>
                    <p>11/08/2023 14:12</p>
                </div>
                <div class="test-card-buttons">
                    <button onclick="startTest(20)">Test ngay</button>
                    <button>Chọn từng part</button>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <h3>TÀI LIỆU TOEIC</h3>
            <div class="sidebar-item">
                <p>BÍ KÍP ĐẠT 550+ TOEIC LISTENING & READING CHỈ SAU 1 LẦN HỌC</p>
            </div>
            <div class="sidebar-item">
                <p>Lộ trình TOEIC 700+ 4 Kỹ năng trong 10 tháng</p>
            </div>
            <div class="sidebar-item">
                <p>HỌC TOEIC SPEAKING & WRITING Ở ĐÂU TẠI HÀ NỘI 2024 HIỆU QUẢ</p>
            </div>
            <div class="sidebar-item">
                <p>Lộ trình học TOEIC 450 cho người mất gốc</p>
            </div>
            <div class="sidebar-item">
                <p>Đề cương tiếng Anh học phần 2 dành cho sinh viên AJC</p>
            </div>
            <h3>VINH DANH HỌC VIÊN</h3>
            <div class="sidebar-item">
                <p>3 tháng đạt 905 TOEIC đủ chuẩn điều kiện ra trường NEU cùng Đại sứ Thế Anh</p>
            </div>
            <div class="sidebar-item">
                <p>Đại sứ TOEIC 960 và hành trình chinh phục chứng chỉ đáng nể phục</p>
            </div>
        </div>
        <h3>CÀI ĐẶT SỐ LƯỢNG CÂU HỎI</h3>
    <form action="{{ route('admin.updateQuestions') }}" method="POST">
        @csrf
        <div class="sidebar-item">
            <label for="num_questions">Số lượng câu hỏi:</label>
            <input type="number" id="num_questions" name="num_questions" value="{{ session('num_questions', 10) }}" min="1" required>
        </div>
        <button type="submit">Lưu</button>
    </form>
    </div>
    <div class="footer">
        HỆ THỐNG THI TRỰC TUYẾN
    </div>

    <script>
        function startTest(numQuestions) {
            window.location.href = `test-page?questions=${numQuestions}`;
        }
    </script>
</body>
</html>
