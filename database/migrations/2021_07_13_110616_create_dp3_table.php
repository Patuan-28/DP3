<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDp3Table extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 30)->unique()->nullable();
            $table->string('nidn', 30)->unique()->nullable();
            $table->string('phone', 13)->unique()->nullable();
            $table->string('email')->unique();
            $table->string('name', 150);
            $table->string('place_birth')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('religion')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->longText('address')->nullable();
            $table->string('photo')->nullable();
            $table->integer('class_id')->default(0);
            $table->enum('gender', ['l', 'p'])->nullable();
            $table->enum('role', ['a', 's', 'm'])->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('kelolapenilaians', function (Blueprint $table) {
            $table->id();
            $table->longText('nama');
            $table->longText('kategori');
            $table->string('skor');
            $table->string('rubik');
            $table->timestamps();
        });
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->integer('penilai_id');
            $table->integer('user_id');
            $table->string('nilai');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('kelolapenilaians');
        Schema::dropIfExists('penilaians');
    }
}
