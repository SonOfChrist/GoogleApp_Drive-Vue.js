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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string( column: 'name', length: 1024);
            $table->string( column: 'path', length: 1024)->nullable();
            $table->nestedSet();
            $table->boolean( column: 'is_folder');
            $table->string( column: 'mime')->nullable();
            $table->integer( column: 'size')->nullable();
            $table->timestamps();
            $table->foreignIdFor( model: \App\Models\User::class, column: 'created_by');
            $table->foreignIdFor( model: \App\Models\User::class, column: 'updated_by');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
