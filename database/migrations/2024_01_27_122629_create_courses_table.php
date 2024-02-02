<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       if(!Schema::hasTable('courses')){ 
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_title');
            $table->string('description');
            $table->unsignedBigInteger('teacher_id');
            $table->string('video_url');
            $table->string('image_url');
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
      }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
