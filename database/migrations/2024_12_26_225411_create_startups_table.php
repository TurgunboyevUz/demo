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
        Schema::create('startups', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('criteria_id')->constrained('criterias')->cascadeOnDelete();

            $table->string('title');
            $table->enum('type', ['startup', 'contest']);
            $table->enum('participant', ['individual', 'team']);
            $table->text('team_members')->nullable();
            $table->enum('location', ['tashkent', 'andijan']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('startups');
    }
};