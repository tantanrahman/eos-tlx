<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeForeignTrackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracking_shipment', function (Blueprint $table) {
            $table->dropForeign(['shipment_id']);
        });

        Schema::table('tracking_shipment', function (Blueprint $table) {
            $table->foreign('shipment_id')->references('id')->on('shipment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracking_shipment', function (Blueprint $table) {
            //
        });
    }
}
