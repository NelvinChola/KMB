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
        Schema::create('musics', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('title');                // Track title
            $table->string('artist');               // Artist name
            $table->string('genre')->nullable();    // Genre (Afrobeat, Kalindula, etc.)
            $table->text('description')->nullable(); // Optional description, lyrics, or notes

            // Media Files
            $table->string('cover_image')->nullable(); // Album art or thumbnail
            $table->string('file_path')->nullable();   // Path to uploaded music file

            // Metadata
            $table->enum('status', ['draft', 'pending', 'published'])->default('draft');
            $table->unsignedBigInteger('downloads')->default(0);

            // User Relation
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musics');
    }
};
