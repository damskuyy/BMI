<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->boolean('center_image')->default(false)->after('display_mode');
        });
    }

    public function down()
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->dropColumn('center_image');
        });
    }
};
