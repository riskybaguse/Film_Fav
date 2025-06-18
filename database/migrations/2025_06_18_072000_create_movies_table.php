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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('The title of the movie');
            $table->string('director')->nullable()->comment('The director of the movie');
            $table->year('release_year')->nullable()->comment('The year the movie was released');
            $table->text('synopsis')->nullable()->comment('A brief description of the movie');
            $table->string('poster_url')->nullable()->comment('URL of the movie poster');
            $table->string('genre')->nullable()->comment('The genre of the movie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
