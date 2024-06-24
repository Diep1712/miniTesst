<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Tests</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: auto;
            text-align: center;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
        }
        .test-list {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
            border-top: 1px solid #ddd;
        }
        .test-list li {
            padding: 15px 0;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .test-link {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .test-link:hover {
            color: #0056b3;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .no-tests {
            color: #888;
            font-style: italic;
            padding: 10px 0;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #666;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>User Tests for User {{ $userId }}</h1>
    <ul class="test-list">
        @if (empty($uniqueTests))
            <li class="no-tests">No tests found for this user.</li>
        @else
            @foreach ($uniqueTests as $test)
                <li>
                    <span>Bài Test : {{ $test }}</span>
                    <a href="{{ route('user.tests.review', ['userId' => $userId, 'testId' => $test]) }}" class="test-link">
                        Review Test
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
    <div class="footer">
        <p>Designed by Your Company &copy; 2024. All rights reserved. | <a href="#">Privacy Policy</a></p>
    </div>
</div>

</body>
</html>
