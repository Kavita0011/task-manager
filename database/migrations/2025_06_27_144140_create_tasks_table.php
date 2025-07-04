<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
// Purpose: Create tasks table with user_id foreign key
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // 🔥 Add this line
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->date('due_date');
            $table->timestamps();
        });
    }
    // Purpose: Drop tasks table
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
