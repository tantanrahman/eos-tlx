<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostalcodeWorldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postalcode_world', function (Blueprint $table) {
            $table->id();
            $table->string('postal_code');
            $table->string('country_code');
            $table->string('place_name');
            $table->string('admin_name1');
            $table->string('code_name1');
            $table->string('admin_name2');
            $table->string('code_name2');
            $table->string('admin_name3');
            $table->string('code_name3');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('accuracy');
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
        Schema::dropIfExists('postalcode_world');
    }
}
