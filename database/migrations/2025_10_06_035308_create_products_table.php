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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('category')->nullable(); // manufaktur, kuliner, kerajinan
            $table->string('ordering_method')->default('whatsapp'); // marketplace or whatsapp
            $table->string('shopee_link')->nullable();
            $table->string('tokopedia_link')->nullable();
            $table->string('phone')->nullable(); // phone number for whatsapp
            $table->boolean('use_default_phone')->nullable()->default(true);
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
