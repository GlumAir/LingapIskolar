<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade');
            $table->string('action');
            $table->foreignId('performed_by')->constrained('users')->onDelete('cascade');
            $table->json('old_value')->nullable();
            $table->json('new_value')->nullable();
            $table->timestamp('created_at');
            
            $table->index(['ticket_id', 'created_at']);
            $table->index('performed_by');
            
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_activity_logs');
    }
};