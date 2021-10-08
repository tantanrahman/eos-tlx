<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFkTrackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stracking_shipment', function (Blueprint $table) {
            Schema::table('tracking_shipment', function (Blueprint $table) {
                $table->dropForeign(['shipment_id']);
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stracking_shipment', function (Blueprint $table) {
            //
        });
    }
}
