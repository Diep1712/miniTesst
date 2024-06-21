<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Tests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 50%;
            margin: auto;
            text-align: center;
        }
        .test-list {
            list-style-type: none;
            padding: 0;
        }
        .test-list li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .hidden {
            display: none;
        }
        .test-link {
            text-decoration: none;
            color: #000;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Tests for User {{ $userId }}</h1>
    <ul class="test-list">
    @if (empty($uniqueTests))
        <li>No tests found for this user.</li>
    @else
        @foreach ($uniqueTests as $test)
            <li>
                <a href="{{ route('user.tests.review', ['userId' => $userId, 'testId' => $test]) }}" class="test-link">
                    Test ID: {{ $test }}
                </a>
            </li>
        @endforeach
    @endif
</ul>

</div>

</body>
</html>
