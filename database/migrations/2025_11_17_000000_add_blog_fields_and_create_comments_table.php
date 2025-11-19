<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // add columns to blogs
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'category')) {
                $table->string('category')->nullable()->after('status');
            }
            if (!Schema::hasColumn('blogs', 'quote')) {
                $table->string('quote')->nullable()->after('category');
            }
            if (!Schema::hasColumn('blogs', 'poster_name')) {
                $table->string('poster_name')->nullable()->after('quote');
            }
            if (!Schema::hasColumn('blogs', 'posted_at')) {
                $table->timestamp('posted_at')->nullable()->after('poster_name');
            }
        });

        // create comments table
        if (!Schema::hasTable('comments')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('blog_id')->constrained('blogs')->onDelete('cascade');
                $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
                $table->unsignedBigInteger('parent_id')->nullable();
                $table->string('name');
                $table->text('comment');
                $table->timestamps();

                $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('comments')) {
            Schema::dropIfExists('comments');
        }

        Schema::table('blogs', function (Blueprint $table) {
            if (Schema::hasColumn('blogs', 'posted_at')) {
                $table->dropColumn('posted_at');
            }
            if (Schema::hasColumn('blogs', 'poster_name')) {
                $table->dropColumn('poster_name');
            }
            if (Schema::hasColumn('blogs', 'quote')) {
                $table->dropColumn('quote');
            }
            if (Schema::hasColumn('blogs', 'category')) {
                $table->dropColumn('category');
            }
        });
    }
};
