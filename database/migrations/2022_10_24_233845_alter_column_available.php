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
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('avaible_at', 'available_at');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dateTime('available_at')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dateTime('available_at')->change();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('available_at', 'avaible_at');
        });
    }
};
