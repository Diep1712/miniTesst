<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Course Limits</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
        }
        .card-header {
            background: linear-gradient(45deg, #007bff, #00d4ff);
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .card-header h1 {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .form-group label {
            font-weight: bold;
            color: #333;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .btn-success {
            background: linear-gradient(45deg, #28a745, #20c997);
            border: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn-success:hover {
            background: linear-gradient(45deg, #20c997, #28a745);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">Set Course Limits</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('set.course') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="beginner_min" class="form-label">Beginner Min:</label>
                                <input type="number" class="form-control" name="beginner_min" id="beginner_min" value="{{ session('beginner_min', 1) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="beginner_max" class="form-label">Beginner Max:</label>
                                <input type="number" class="form-control" name="beginner_max" id="beginner_max" value="{{ session('beginner_max', 2) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="intermediate_min" class="form-label">Intermediate Min:</label>
                                <input type="number" class="form-control" name="intermediate_min" id="intermediate_min" value="{{ session('intermediate_min', 3) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="intermediate_max" class="form-label">Intermediate Max:</label>
                                <input type="number" class="form-control" name="intermediate_max" id="intermediate_max" value="{{ session('intermediate_max', 5) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="low_intermediate_min" class="form-label">Low Intermediate Min:</label>
                                <input type="number" class="form-control" name="low_intermediate_min" id="low_intermediate_min" value="{{ session('low_intermediate_min', 6) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="low_intermediate_max" class="form-label">Low Intermediate Max:</label>
                                <input type="number" class="form-control" name="low_intermediate_max" id="low_intermediate_max" value="{{ session('low_intermediate_max', 8) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="advanced_min" class="form-label">Advanced Min:</label>
                                <input type="number" class="form-control" name="advanced_min" id="advanced_min" value="{{ session('advanced_min', 9) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="advanced_max" class="form-label">Advanced Max:</label>
                                <input type="number" class="form-control" name="advanced_max" id="advanced_max" value="{{ session('advanced_max', 11) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Set Limits</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
