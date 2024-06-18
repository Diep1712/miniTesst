<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống kiểm tra trực tuyến</title>
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
        .question p {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        .question label {
            display: block;
            font-size: 16px;
            margin: 5px 0;
        }
        .nav-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .nav-buttons button {
            background-color: #0c2e4e;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .nav-buttons button:disabled {
            background-color: #bbb;
            cursor: not-allowed;
        }
        .submit-button {
            background-color: #00FF00;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            display: none; /* Ẩn nút nộp bài khi không còn câu hỏi */
        }
        /* CSS đoạn này không cần thiết và có thể gây lỗi */
        #submitBtn {
            background-color: #00CC00;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Hệ thống kiểm tra trực tuyến</h1>
        <div class="info">
            <span>Số câu hỏi: {{ $questions->count() }}</span>
            <button>Đăng xuất</button>
        </div>
    </div>
    <div class="container">
        <div class="question-section">
            <h2>Bài thi trực tuyến</h2>
            <form action="{{ route('submit') }}" method="POST" id="quizForm">
                @csrf
                @foreach($questions as $index => $question)
                    <div class="question" id="question-{{ $index }}" style="display: {{ $index == 0 ? 'block' : 'none' }};">
                        <p>{{ $index + 1 }}. {{ $question->content }}</p>
                        <label>
                            <input type="radio" name="answers[{{ $question->id }}]" value="A">
                            {{ $question->option_a }}
                        </label>
                        <label>
                            <input type="radio" name="answers[{{ $question->id }}]" value="B">
                            {{ $question->option_b }}
                        </label>
                        <label>
                            <input type="radio" name="answers[{{ $question->id }}]" value="C">
                            {{ $question->option_c }}
                        </label>
                        <label>
                            <input type="radio" name="answers[{{ $question->id }}]" value="D">
                            {{ $question->option_d }}
                        </label>
                    </div>
                @endforeach
                <div class="nav-buttons">
                    <button type="button" id="prevBtn" onclick="changeQuestion(-1)" disabled>Trước</button>
                    <button type="button" id="nextBtn" onclick="changeQuestion(1)">Tiếp theo</button>
                    <button type="submit" class="submit-button" id="submitBtn">Nộp bài</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        let currentQuestion = 0;
        const totalQuestions = {{ $questions->count() }};
        
        function changeQuestion(direction) {
            const questions = document.querySelectorAll('.question');
            questions[currentQuestion].style.display = 'none';
            currentQuestion += direction;
            questions[currentQuestion].style.display = 'block';

            document.getElementById('prevBtn').disabled = currentQuestion === 0;
            document.getElementById('nextBtn').style.display = currentQuestion === totalQuestions - 1 ? 'none' : 'inline-block';
            document.getElementById('submitBtn').style.display = currentQuestion === totalQuestions - 1 ? 'inline-block' : 'none';
        }
    </script>
</body>
</html>
