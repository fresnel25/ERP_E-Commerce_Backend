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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->longText('Description')->nullable();
            $table->string('Profil');
            $table->float('Price');
            $table->integer('QuantityInit');
            $table->integer('QuantityStock');
            $table->integer('TotalQuantityStock');

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('set null');

            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
