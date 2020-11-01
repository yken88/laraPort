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
            $table->string('transferring')->name('移乗');
            $table->string('toilet_action')->name('トイレ動作');
            $table->string('flatland_walking')->name('平地歩行');
            $table->string('meal')->name('食事');
            $table->string('excretion')->name('排泄');
            $table->string('bathing')->name('入浴');
            $table->string('clothes')->name('更衣');
            $table->text('discription')->name('備考');
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
