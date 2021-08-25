<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingShipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_shipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipment_id');
            $table->dateTime('track_time')->nullable();
            $table->text('status_eng')->nullable();
            $table->text('status_ind')->nullable();
            $table->string('apikey')->nullable()->unique();
            $table->timestamps();

            $table->foreign('shipment_id')->references('id')->on('shipment');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracking_shipment');
    }
}
