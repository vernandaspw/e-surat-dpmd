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
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('no_surat', 30);
            $table->date('tgl_surat_keluar')->nullable();
            $table->mediumText('perihal');
            $table->string('rak')->nullable();
            $table->date('tgl_penyampaian')->nullable();
            $table->string('lampiran', 80)->nullable();
            $table->mediumText('bagian')->nullable();
            $table->string('tujuan',30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluars');
    }
};
