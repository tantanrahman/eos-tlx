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
            $table->string('account_code',150)->unique();
            $table->string('name');
            $table->string('company_name',150)->nullable();
            $table->text('address');
            $table->bigInteger('city_id');
            $table->string('city_name',150)->nullable();
            $table->bigInteger('country_id');
            $table->string('country_name',200)->nullable();
            $table->string('phone',60)->nullable();
            $table->enum('group', ['shipper','consignee'])->default('shipper');
            $table->string('postal_code',20)->nullable();
            $table->string('apikey')->nullable()->unique();
            $table->string('api_password',150)->nullable();
            $table->string('credit',200)->nullable();
            $table->string('created_by');
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
