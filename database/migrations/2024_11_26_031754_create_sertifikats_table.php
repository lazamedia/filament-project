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
        Schema::create('sertifikats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kode_sertifikat')->unique();
            $table->string('kegiatan');
            $table->string('tanggal');
            $table->string('keterangan');
            $table->string('detail')->nullable();
            $table->foreignId('kode_sertifs_id')
                  ->constrained('kode_sertifs')
                  ->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikats');
    }
};
