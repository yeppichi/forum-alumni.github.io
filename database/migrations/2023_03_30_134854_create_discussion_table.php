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
        Schema::create('discussion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('avatar_id')->nullable();
            $table->integer('sender_id')->nullable();
            $table->integer('topic_id')->nullable();
            // $table->string('image')->nullable();
            $table->json('image')->nullable();
            $table->string('content')->nullable();
            $table->integer('likes_count')->default(0);
            $table->integer('like_by_id')->nullable();

            // $table->integer('replies_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discussion');
    }
};
