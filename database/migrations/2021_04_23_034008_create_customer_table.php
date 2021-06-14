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
            $table->string('account_code',50)->unique();
            $table->string('name',150);
            $table->string('company_name',150)->nullable();
            $table->text('address');
            $table->foreignId('city_id')->references('id')->on('city')->onDelete('cascade');
            $table->foreignId('country_id')->references('id')->on('country')->onDelete('cascade');
            $table->string('phone',60)->nullable();
            $table->enum('group', ['shipper','consignee'])->default('shipper');
            $table->string('postal_code',20)->nullable();
            $table->string('sum_key',150)->nullable()->unique();
            $table->string('api_password',150)->nullable();
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
