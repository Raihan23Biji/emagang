<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiMagangTable extends Migration
{
    public function up()
    {
        Schema::create('nilai_magang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            // Kolom nilai aspek (bisa integer dari 0 - 100)
            $table->integer('kepribadian');
            $table->integer('penguasaan_materi');
            $table->integer('kedisiplinan');
            $table->integer('kreativitas');
            $table->integer('kerja_sama_tim');
            $table->integer('tanggung_jawab');

            $table->timestamps();

            // Relasi ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai_magang');
    }
}
