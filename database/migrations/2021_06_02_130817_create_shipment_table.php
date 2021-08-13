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
            $table->bigInteger('partner_id')->nullable();
            $table->bigInteger('connote');
            $table->string('values',50)->nullable();
            $table->bigInteger('amount')->nullable();
            $table->string('redoc_connote',150)->nullable();
            $table->text('redoc_params')->nullable();
            $table->tinyInteger('kpi')->default(0);
            $table->dateTime('kpi_created_at')->nullable();
            $table->bigInteger('modal')->nullable();
            $table->string('payment_method',150)->nullable();
            $table->smallInteger('payment_status')->nullable();
            $table->dateTime('payment_created_at')->nullable();
            $table->text('delivery_intructions')->nullable();
            $table->text('remark')->nullable();
            $table->smallInteger('printed')->default(0);
            $table->text('description')->nullable();
            $table->string('created_by',200);
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
