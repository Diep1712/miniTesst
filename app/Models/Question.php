<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['content', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_answer'];

    public function tests()
    {
        return $this->belongsToMany(Test::class, 'test_questions', 'question_id', 'test_id');
    }
}
