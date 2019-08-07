<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->boolean('seat_capacity');
            $table->boolean('ac');
            $table->boolean('share');
            $table->string('pickup_address', 100);
            $table->string('location',100);
            $table->string('start_meter_reading',50);
            $table->string('end_meter_reading',50);
            $table->string('total_payable',50);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('org_id')->unsigned()->nullable();
            $table->foreign('org_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->bigInteger('vehicle_id')->unsigned();
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->bigInteger('driver_id')->unsigned();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');






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
        Schema::dropIfExists('reservations');
    }
}
