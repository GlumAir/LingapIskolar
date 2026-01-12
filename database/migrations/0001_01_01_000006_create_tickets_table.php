<?php

//database/migrations/2024_01_01_000004_create_tickets_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('ticket_categories')->onDelete('restrict');
            $table->foreignId('status_id')->constrained('ticket_statuses')->onDelete('restrict');
            $table->foreignId('priority_id')->constrained('ticket_priorities')->onDelete('restrict');
            $table->string('subject');
            $table->text('description');
            $table->timestamps();
            
            $table->index(['user_id', 'status_id']);
            $table->index('created_at');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};