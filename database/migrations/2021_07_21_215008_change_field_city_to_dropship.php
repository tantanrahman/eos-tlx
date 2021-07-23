<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldCityToDropship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dropship', function (Blueprint $table) {
            $table->string('city_name',150)->after('berat')->nullable();
            $table->renameColumn('city', 'city_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dropship', function (Blueprint $table) {
            $table->dropColumn('city_name');
            $table->dropColumn('city_id');
        });
    }
}
