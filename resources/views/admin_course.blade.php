<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Value Form</title>
</head>
<body>
    <h2>Input Value Form</h2>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('input.process') }}" method="POST">
        @csrf
        <label for="input_value">Nhập giá trị:</label><br>
        <input type="text" id="input_value" name="input_value"><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
