<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shipper_id');
            $table->bigInteger('consignee_id');
            $table->bigInteger('packagetype_id');
            $table->bigInteger('marketing_id');
            $table->bigInteger('courier_id');
            $table->bigInteger('connote');
            $table->string('values',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipment');
    }
}
