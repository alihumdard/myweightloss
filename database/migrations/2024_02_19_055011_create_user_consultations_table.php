<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_consultations', function (Blueprint $table) {
            $table->id();
            $table->string('question_num');
            $table->string('next_question');
            $table->string('last_question');
            $table->unsignedBigInteger('user_id');
            $table->text('question_title');
            $table->text('question_ans');
            $table->string('status')->default('1');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_consultations');
    }
};
