<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['user_id']; // Để cho phép gán user_id khi tạo bài kiểm tra

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'test_question')
                    ->withPivot('id')
                    ->withTimestamps();
    }
}
