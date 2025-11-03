<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip')->nullable();
            $table->string('path')->nullable();
            $table->timestamp('visited_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visits');
    }
};