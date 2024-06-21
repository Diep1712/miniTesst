<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                                <input type="number" class="form-control" name="beginner_min" id="beginner_min" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="beginner_max" class="form-label">Beginner Max:</label>
                                <input type="number" class="form-control" name="beginner_max" id="beginner_max" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="intermediate_min" class="form-label">Intermediate Min:</label>
                                <input type="number" class="form-control" name="intermediate_min" id="intermediate_min" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="intermediate_max" class="form-label">Intermediate Max:</label>
                                <input type="number" class="form-control" name="intermediate_max" id="intermediate_max" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="advanced_min" class="form-label">Advanced Min:</label>
                                <input type="number" class="form-control" name="advanced_min" id="advanced_min" required>
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
</body>
</html>