<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOngkirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ongkir', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('packagetype_id');
            $table->bigInteger('country_id');
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('price');
            $table->bigInteger('modal')->nullable();
            $table->string('estimation',100)->nullable();
            $table->string('estimation_detail',100)->nullable();
            $table->text('remark')->nullable();
            $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('ongkir');
    }
}
