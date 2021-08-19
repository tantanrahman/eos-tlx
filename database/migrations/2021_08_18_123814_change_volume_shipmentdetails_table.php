<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeVolumeShipmentdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipment_details', function (Blueprint $table) {
            $table->renameColumn('volume', 'sum_volume');
            $table->renameColumn('total_weight', 'sum_weight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipmentdetails', function (Blueprint $table) {
            $table->dropColumn('sum_volume');
            $table->dropColumn('sum_weight');
        });
    }
}
