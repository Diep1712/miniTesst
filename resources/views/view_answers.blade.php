<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Answers</title>
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
        .correct {
            color: green;
            font-weight: bold;
        }
        .incorrect {
            color: red;
            font-weight: bold;
        }
        .correct-answer {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Hệ thống kiểm tra trực tuyến</h1>
        <div class="info">
            <span>Số câu hỏi: </span>
            <button onclick="window.location.href='{{ route('logout') }}'">Đăng xuất</button>
        </div>
    </div>
    <div class="container">
        <div class="question-section">
            @foreach($questions as $index => $question)
                <div class="question">
                    <p>{{ $index + 1 }}. {{ $question->content }}</p>
                    @foreach(['A', 'B', 'C', 'D'] as $option)
                        <label class="{{ $question->correct_answer == $option ? 'correct' : (isset($userAnswers[$question->id]) && $userAnswers[$question->id] == $option ? 'incorrect' : '') }}">
                            <input type="radio" disabled {{ isset($userAnswers[$question->id]) && $userAnswers[$question->id] == $option ? 'checked' : '' }}>
                            {{ $question['option_' . strtolower($option)] }}
                        </label>
                    @endforeach
                    <p class="correct-answer">Đáp án đúng: {{ $question->correct_answer }}</p>
                </div>
            @endforeach
        </div>
        
    </div>
</body>
</html>
