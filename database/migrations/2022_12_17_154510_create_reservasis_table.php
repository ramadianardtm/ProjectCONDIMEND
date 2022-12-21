<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('parkir_id')->references('id')->on('reg_parkirs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nokendaraan');
            $table->string('tipekendaraan');
            $table->string('checkindate');
            $table->string('checkintime');
            $table->string('checkoutdate');
            $table->string('checkouttime');
            $table->string('status');
            $table->string('info');
            $table->string('lamaparkir');
            $table->bigInteger('biayatotal');
            $table->string('metodebayar');
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
        Schema::dropIfExists('reservasis');
    }
}
