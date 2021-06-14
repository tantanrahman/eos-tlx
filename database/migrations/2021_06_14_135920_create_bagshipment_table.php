<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBagshipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bagshipment', function (Blueprint $table) {
            $table->id();
            $table->string('name',70);
            $table->string('resi',150);
            $table->string('partner',100);
            $table->integer('weight');
            $table->string('mawb',100);
            $table->string('created_by',150);
            $table->text('remark');
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
        Schema::dropIfExists('bagshipment');
    }
}
