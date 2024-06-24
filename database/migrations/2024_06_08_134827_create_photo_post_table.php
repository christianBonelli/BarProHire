<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Photo;
use App\Models\Post;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Tabella pivot per associare un post e le sue relative foto
        Schema::create('photo_post', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Post::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Photo::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_post');
    }
};
