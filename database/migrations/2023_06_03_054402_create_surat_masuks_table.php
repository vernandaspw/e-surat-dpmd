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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('no_surat', 30);
            $table->date('tgl_surat_masuk')->nullable();
            $table->string('asal_surat')->nullable();
            $table->mediumText('perihal');
            $table->mediumText('bagian')->nullable();
            $table->string('lampiran', 80)->nullable();
            $table->string('penerima',30)->nullable();
            $table->date('tgl_terima')->nullable();
            $table->boolean('is_disposisi')->nullable();
            $table->date('tgl_disposisi')->nullable();
            $table->longText('keterangan_disposisi')->nullable();
            $table->boolean('is_tolak')->nullable();
            $table->longText('keterangan_tolak')->nullable();
            $table->enum('kepentingan', ['biasa', 'segera']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
