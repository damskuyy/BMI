<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // add description sections to blogs
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'description_1')) {
                $table->longText('description_1')->nullable()->after('content');
            }
            if (!Schema::hasColumn('blogs', 'description_2')) {
                $table->longText('description_2')->nullable()->after('description_1');
            }
            if (!Schema::hasColumn('blogs', 'description_3')) {
                $table->longText('description_3')->nullable()->after('description_2');
            }
            if (!Schema::hasColumn('blogs', 'description_4')) {
                $table->longText('description_4')->nullable()->after('description_3');
            }
            if (!Schema::hasColumn('blogs', 'description_5')) {
                $table->longText('description_5')->nullable()->after('description_4');
            }
        });

        // create supporting images table
        if (!Schema::hasTable('blog_images')) {
            Schema::create('blog_images', function (Blueprint $table) {
                $table->id();
                $table->foreignId('blog_id')->constrained('blogs')->onDelete('cascade');
                $table->string('image');
                $table->string('caption')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('blog_images')) {
            Schema::dropIfExists('blog_images');
        }

        Schema::table('blogs', function (Blueprint $table) {
            if (Schema::hasColumn('blogs', 'description_5')) {
                $table->dropColumn('description_5');
            }
            if (Schema::hasColumn('blogs', 'description_4')) {
                $table->dropColumn('description_4');
            }
            if (Schema::hasColumn('blogs', 'description_3')) {
                $table->dropColumn('description_3');
            }
            if (Schema::hasColumn('blogs', 'description_2')) {
                $table->dropColumn('description_2');
            }
            if (Schema::hasColumn('blogs', 'description_1')) {
                $table->dropColumn('description_1');
            }
        });
    }
};
