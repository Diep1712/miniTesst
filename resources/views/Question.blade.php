<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Test System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .header {
            background-color: #0c2e4e;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
        }
        .header .info {
            display: flex;
            align-items: center;
        }
        .header .info button {
            background-color: #ff7f00;
            color: white;
            border: none;
            padding: 10px;
            margin-right: 20px;
            cursor: pointer;
            font-size: 16px;
        }
        .header .info span {
            margin-right: 20px;
            font-size: 16px;
        }
        .container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .question-section {
            width: 80%;
            background-color: white;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin: auto;
        }
        .question-section h2 {
            margin-top: 0;
            font-size: 24px;
            color: #0c2e4e;
        }
        .question {
            margin-bottom: 20px;
        }
        .options {
            margin-bottom: 20px;
        }
        .options input {
            margin-right: 10px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
        }
        .buttons button {
            padding: 10px 20px;
            background-color: #0c2e4e;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .footer {
            background-color: #ff7f00;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 14px;
        }
        .button-container {
            text-align: center; /* Căn giữa nội dung trong container */
            padding: 50px;
            
        }
        .submit-button {
            background-color: #4CAF50; /* Màu nền */
            border: none; /* Không có viền */
            color: white; /* Màu chữ */
            padding: 15px 30px; /* Kích thước nút */
            text-align: center; /* Canh giữa nội dung */
            text-decoration: none; /* Không gạch chân */
            display: inline-block; /* Hiển thị dạng block */
            font-size: 16px; /* Cỡ chữ */
            cursor: pointer; /* Con trỏ chuột */
            border-radius: 10px; /* Bo tròn góc */
            transition-duration: 0.4s; /* Thời gian chuyển đổi */
        }
        .submit-button:hover {
            background-color: #45a049; /* Màu nền khi di chuột qua */
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>HỆ THỐNG THI TRỰC TUYẾN</h1>
        <div class="info">
            <button>NỘP BÀI</button>
            <span id="countdown">05:00</span>
            <span>Nghiêm Tiến Điệp (Đăng xuất)</span>
        </div>
    </div>

    <div class="container">
        <form id="quizForm" action="{{ route('submit.quiz') }}" method="post">
            @csrf
            @php $count = 1; @endphp
            @foreach($questions as $question)
                <div class="question-section">
                    <h2>Câu {{ $count }}: {{ $question->content }}</h2>
                    <div class="options">
                        <input type="radio" id="option_a_{{ $question->id }}" name="answers[{{ $question->id }}]" value="A">
                        <label for="option_a_{{ $question->id }}">{{ $question->option_a }}</label>
                        <br>
                        <input type="radio" id="option_b_{{ $question->id }}" name="answers[{{ $question->id }}]" value="B">
                        <label for="option_b_{{ $question->id }}">{{ $question->option_b }}</label>
                        <br>
                        <input type="radio" id="option_c_{{ $question->id }}" name="answers[{{ $question->id }}]" value="C">
                        <label for="option_c_{{ $question->id }}">{{ $question->option_c }}</label>
                        <br>
                        <input type="radio" id="option_d_{{ $question->id }}" name="answers[{{ $question->id }}]" value="D">
                        <label for="option_d_{{ $question->id }}">{{ $question->option_d }}</label>
                    </div>
                </div>
                @php $count++; @endphp
            @endforeach
            <div class="button-container">
                <input type="submit" value="Nộp bài" class="submit-button">
            </div>
        </form>
    </div>

    <div class="footer">
        HỆ THỐNG THI TRỰC TUYẾN
    </div>

    <script>
        var now = new Date().getTime();
        var countdownTime = new Date(now + 5 * 60 * 1000).getTime();

        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countdownTime - now;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML = ("0" + minutes).slice(-2) + ":" + ("0" + seconds).slice(-2);

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "Hết thời gian";
                document.getElementById("quizForm").submit();
            }
        }, 1000);
    </script>
</body>
</html>
