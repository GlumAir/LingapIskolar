<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade');
            $table->foreignId('agent_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('assigned_at');

            $table->index(['ticket_id', 'assigned_at']);
            $table->index('agent_id');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_assignments');
    }
};