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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->string('code', 50)->nullable()->default(null);
            $table->string('title', 100)->nullable()->default(null);
            $table->string('preview', 200)->nullable()->default(null);
            $table->text('body')->nullable()->default(null);
            $table->string('video_link', 50)->nullable()->default(null);
            $table->string('question_file_path', 255)->nullable()->default(null);
            $table->string('answer_file_path', 255)->nullable()->default(null);
            $table->string('total_assesment', 25)->nullable()->default(null);
            $table->string('time_limit', 10)->nullable()->default(null);
            $table->string('score', 10)->nullable()->default(null);
            $table->boolean('one_time_work')->nullable()->default(false);
            $table->string('thumbnail_path', 255)->nullable()->default(null);
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable()->default(null);
            $table->unsignedBigInteger('updated_by')->nullable()->default(null);

            $table->index('user_id');
            $table->index('created_by');
            $table->index('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
