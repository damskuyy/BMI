php artisan view:clear
php artisan cache:clear
php artisan config:clear<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        if (Schema::hasTable('comments')) {
            Schema::table('comments', function (Blueprint $table) {
                if (!Schema::hasColumn('comments', 'email')) {
                    $table->string('email')->nullable()->after('name');
                }
                if (!Schema::hasColumn('comments', 'foto')) {
                    $table->string('foto')->nullable()->after('email');
                }
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('comments')) {
            Schema::table('comments', function (Blueprint $table) {
                if (Schema::hasColumn('comments', 'foto')) {
                    $table->dropColumn('foto');
                }
                if (Schema::hasColumn('comments', 'email')) {
                    $table->dropColumn('email');
                }
            });
        }
    }
};
