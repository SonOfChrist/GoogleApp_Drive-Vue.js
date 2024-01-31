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
        Schema::create('starred_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId( column: 'file_id')->constrained( table: 'files');
            $table->foreignId( column: 'user_id')->constrained( table: 'users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('starred_files');
    }
};
