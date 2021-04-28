<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('account_code',50);
            $table->string('name',150);
            $table->string('company_name',150)->nullable();
            $table->text('address');
            $table->foreignId('district_id')->references('id')->on('city')->onDelete('cascade');
            $table->string('phone',60);
            $table->enum('grup', ['shipper','consignee'])->default('shipper');
            $table->string('postal_code',20);
            $table->foreignId('postalcode_id')->references('id')->on('city')->onDelete('cascade');
            $table->string('sum_key',150)->nullable()->unique();
            $table->string('api_passowrd',150);
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('customer');
    }
}
