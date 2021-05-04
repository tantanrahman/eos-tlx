<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDropshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropship', function (Blueprint $table) {
            $table->id();
            $table->string('resi',50)->unique();
            $table->string('name',100);
            $table->foreignId('courier_id')->references('id')->on('courier')->onDelete('cascade');
            $table->string('jenis_barang',50);
            $table->float('berat',11,2);
            $table->foreignId('city',50)->references('id')->on('city')->onDelete('cascade');
            $table->foreignId('users_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('photo',150)->nullable();
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
        Schema::dropIfExists('dropship');
    }
}
