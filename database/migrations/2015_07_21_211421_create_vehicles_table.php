<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand',50);
            $table->string('model',50);
            $table->string('color',50);
            $table->string('reg_number',50);
            $table->date('reg_date');
            $table->string('seat_capacity',20);
            $table->string('ac');
            $table->string('reg_scan_copy');
            $table->string('photo');
            $table->string('insurance_scan_copy',100);
            $table->string('roadPermit_scan_copy',100);
            $table->string('ownership_status',100);
            $table->boolean('status');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('org_id')->unsigned();
            $table->foreign('org_id')->references('id')->on('organizations')->onDelete('cascade');


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
        Schema::dropIfExists('vehicles');
    }
}
