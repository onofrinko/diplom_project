<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('property_types', function (Blueprint $table) {
            $table->increments('property_type_id');
            $table->string('type', 30)->unique();
        });

        Schema::create('property_details', function (Blueprint $table) {
            $table->increments('property_details_id');
            $table->string('property_name', 50);
            $table->json('details');
            $table->integer('property_type_id')->unsigned();

            $table->foreign('property_type_id')->references('property_type_id')->on('property_types');
        });

        Schema::create('lendlords', function (Blueprint $table) {
            $table->increments('lendlord_id');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->integer('user_id')->unsigned();
            $table->string('phone_number', 15);

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('properties', function (Blueprint $table) {
            $table->integer('lendlord_id');
            $table->integer('cost');
            $table->float('total_area');
            $table->date('pub_date');
            $table->string('property_status', 20);
            $table->integer('property_type_id')->unsigned();
            $table->json('property_details');

            $table->primary('lendlord_id');

            $table->foreign('lendlord_id')->references('lendlord_id')->on('lendlords');
            $table->foreign('property_type_id')->references('property_type_id')->on('property_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
        Schema::dropIfExists('lendlords');
        Schema::dropIfExists('property_details');
        Schema::dropIfExists('property_types');
    }
};
