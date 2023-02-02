<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('progres', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('date');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('progres', function (Blueprint $table) {
            if (Schema::hasColumn('progres', 'slug')) {
                $table->dropColumn('slug');
            }
            if (Schema::hasColumn('progres')) {
                $table->dropSoftDeletes();
            }
        });
    }
};