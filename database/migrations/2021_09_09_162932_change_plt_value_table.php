<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePltValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipment_details', function (Blueprint $table) {
            $table->float('actual_weight',11,2)->nullable()->change();
            $table->float('length',11,2)->nullable()->change();
            $table->float('width',11,2)->nullable()->change();
            $table->float('height',11,2)->nullable()->change();
            $table->float('sum_volume',11,2)->nullable()->change();
            $table->float('sum_weight',11,2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipment_details', function (Blueprint $table) {
            $table->dropColumn('actual_weight');
            $table->dropColumn('length');
            $table->dropColumn('width');
            $table->dropColumn('height');
            $table->dropColumn('sum_volume');
            $table->dropColumn('sum_weight');
        });
    }
}
