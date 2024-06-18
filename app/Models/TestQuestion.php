<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $table = 'test_questions'; // Sửa tên bảng thành 'test_question'

    protected $fillable = [
        'test_id', 'question_id',
    ];

    // Các phương thức khác của model
}
