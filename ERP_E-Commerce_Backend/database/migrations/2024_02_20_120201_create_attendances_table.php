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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->boolean('Status');
            $table->date('Date');
            $table->string('Time_start');
            $table->string('Time_end');
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('set null');
            $table->foreignId('create_id')
                ->constrained('users')
                ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
