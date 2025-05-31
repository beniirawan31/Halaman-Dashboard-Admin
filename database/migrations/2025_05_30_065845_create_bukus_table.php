<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('nama_pengarang');
            $table->enum('kategori', ['php', 'laravel', 'flutter', 'kotlin', 'swift', 'ui_design', 'data_science']);
            $table->text('deskription');
            $table->text('information')->nullable();
            $table->integer('harga');
            $table->integer('diskon')->default(0);
            $table->integer('total_harga');
            $table->integer('stock');
            $table->integer('sold')->default(0);
            $table->float('rating')->default(0);
            $table->integer('point')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
