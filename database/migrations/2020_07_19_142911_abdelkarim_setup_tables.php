<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AbdelkarimSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for accounts
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('number')->unique();
            $table->date('expiration_date');
            $table->double('amount', 8, 2)->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
        
        // Create table for airplane models
        Schema::create('airplane_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number_of_economy_class_seats');
            $table->integer('number_of_businessmen_seats');
            $table->integer('number_of_first_class_seats');
            $table->string('photo');
            $table->timestamps();
        });
        
        Schema::create('airplanes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('model_id')->unsigned();
            $table->string('name');
            $table->string('photo');
            $table->timestamps();
            $table->foreign('model_id')->references('id')->on('airplane_models');
        });
        
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('state');
            $table->string('photo');
            $table->timestamps();
        });
        
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('economic_class_price', 8, 2);
            $table->double('business_class_price', 8, 2);
            $table->double('firste_class_price', 8, 2);
            $table->timestamps();
        });
        
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_take_off');
            $table->date('date_landing');
            $table->string('status');
            $table->string('photo');
            $table->unsignedBigInteger('take_off_airport_id');
            $table->unsignedBigInteger('landing_airport_id');
            $table->unsignedBigInteger('airplane_id');
            $table->unsignedBigInteger('price_id');
            $table->timestamps();
            $table->foreign('airplane_id')->references('id')->on('airplanes');
            $table->foreign('take_off_airport_id')->references('id')->on('airports');
            $table->foreign('landing_airport_id')->references('id')->on('airports');
            $table->foreign('price_id')->references('id')->on('prices');
        });
        
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('flight_id')->unsigned();
            $table->integer('reserved_economy_class')->default(0);
            $table->integer('reserved_businessmen_class')->default(0);
            $table->integer('reserved_first_class')->default(0);
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('flight_id')->references('id')->on('flights');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('flights');
        Schema::dropIfExists('prices');
        Schema::dropIfExists('airports');
        Schema::dropIfExists('airplanes');
        Schema::dropIfExists('airplane_models');
        Schema::dropIfExists('credit_card');
    }
}
