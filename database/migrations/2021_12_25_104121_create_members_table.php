<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('no_anggota', 11)->unique();
            $table->string('nama_anggota', 50);
            $table->enum('jen_kel', ['Laki-Laki', 'Perempuan']);
            $table->enum('status', ['Guru', 'Siswa', 'Staff']);
            $table->enum('kelas', ['TK', 'SD', 'SMP'])->nullable();
            $table->string('no_telp', 13)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
