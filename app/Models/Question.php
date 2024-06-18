<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'user_id', 'content', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_answer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
