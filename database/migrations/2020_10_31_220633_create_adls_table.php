<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('resident_id');
            $table->integer('transferring')->name('移乗');
            $table->integer('toilet_action')->name('トイレ動作');
            $table->integer('flatland_walking')->name('平地歩行');
            $table->integer('meal')->name('食事');
            $table->integer('excretion')->name('排泄');
            $table->integer('bathing')->name('入浴');
            $table->integer('clothes')->name('更衣');
            $table->timestamps();

            $table->foreign('resident_id')->references('id')->on('residents');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adls');
    }
}
