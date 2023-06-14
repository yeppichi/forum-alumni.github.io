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
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->date('birth_date');
            $table->enum('gender', array('Male', 'Female'));
            $table->text('address');
            $table->text('bio')->nullable();
            // $table->string('avatar')->nullable();
            // $table->string('avatar_id')->default('default.png');
            $table->integer('department_id')->nullable();
            $table->integer('categories_id');
            $table->integer('activity_id')->nullable();
            $table->string('description')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
