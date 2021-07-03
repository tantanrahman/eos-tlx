<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldAboutToOfficeprofile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('officeprofile', function (Blueprint $table) {
            $table->text('about')->after('name')->nullable();
            $table->text('address')->after('about')->nullable();
            $table->text('embed_gmap')->after('address')->nullable();
            $table->string('facebook',50)->after('embed_gmap')->nullable();
            $table->string('whatsapp',50)->after('facebook')->nullable();
            $table->string('instagram',50)->after('whatsapp')->nullable();
            $table->string('youtube',50)->after('instagram')->nullable();
            $table->string('twitter',50)->after('youtube')->nullable();
            $table->string('tiktok',50)->after('twitter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('officeprofile', function (Blueprint $table) {
            $table->dropColumn('about');
            $table->dropColumn('address');
            $table->dropColumn('embed_gmap');
            $table->dropColumn('facebook');
            $table->dropColumn('whatsapp');
            $table->dropColumn('instagram');
            $table->dropColumn('youtube');
            $table->dropColumn('twitter');
            $table->dropColumn('tiktok');
        });
    }
}
