<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position'); // Stuktur
            $table->string('sector'); // Sektor
            $table->string('business'); // Usaha
            $table->string('product'); // Produk
            $table->string('domicile'); // Domisili
            $table->string('phone'); // No HP
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
}