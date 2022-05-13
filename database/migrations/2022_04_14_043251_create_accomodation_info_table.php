<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccomodationInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bussiness_name')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('region_code')->nullable();
            $table->string('street_address')->nullable();
            $table->string('additional_information')->nullable();
            $table->string('total_room')->nullable();
            $table->string('price_min')->nullable();
            $table->string('currency')->nullable();
            $table->string('description')->nullable();
            $table->string('additional_description')->nullable();
            $table->string('min_stay')->nullable();
            $table->string('security')->nullable();
            $table->string('staff')->nullable();
            $table->string('housekeeping')->nullable();
            $table->string('frontdesk')->nullable();
            $table->string('bathroom')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('accomodation_info');
    }
}
