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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->longText('Reason');
            $table->date('Start_date');
            $table->date('End_date');
            $table->boolean('Status');
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
        Schema::dropIfExists('leaves');
    }
};
