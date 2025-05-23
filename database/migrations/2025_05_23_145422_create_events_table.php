<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('speaker')->nullable();
            $table->decimal('harga', 10, 2)->default(0);
            $table->integer('diskon')->default(0); 
            $table->integer('quota')->nullable();
            $table->integer('point')->default(0);
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->text('information')->nullable();
            $table->string('kategori'); 
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
