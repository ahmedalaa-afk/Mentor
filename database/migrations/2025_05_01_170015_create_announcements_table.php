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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->foreignId('category_id')->constrained('categories');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->enum('status', ['active', 'inactive']);
            $table->enum('importance', ['low', 'medium', 'high']);
            $table->foreignId('admin_id')->constrained('users');
            $table->enum('target_audience', ['all', 'students', 'teachers', 'admins'])->default('all');
            $table->boolean('is_pinned')->default(false);
            $table->unsignedInteger('views_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
