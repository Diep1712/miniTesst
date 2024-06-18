<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->foreignId('test_id')->constrained()->onDelete('cascade');
            $table->char('user_answer', 1);
            $table->tinyInteger('is_correct')->default(0); // Thay đổi cột is_correct thành tinyInteger với giá trị mặc định là 0
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_answers');
    }
}
