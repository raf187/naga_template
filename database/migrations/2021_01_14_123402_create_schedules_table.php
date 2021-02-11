<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->time('mondayMorning1')->default('0');
            $table->time('mondayMorning2')->default('0');
            $table->time('mondayNigth1')->default('0');
            $table->time('mondayNigth2')->default('0');
            $table->boolean('mondayOpenMorning')->default('0');
            $table->boolean('mondayOpenNigth')->default('0');
            $table->time('tuesdayMorning1')->default('0');
            $table->time('tuesdayMorning2')->default('0');
            $table->time('tuesdayNigth1')->default('0');
            $table->time('tuesdayNigth2')->default('0');
            $table->boolean('tuesdayOpenMorning')->default('0');
            $table->boolean('tuesdayOpenNigth')->default('0');
            $table->time('wednesdayMorning1')->default('0');
            $table->time('wednesdayMorning2')->default('0');
            $table->time('wednesdayNigth1')->default('0');
            $table->time('wednesdayNigth2')->default('0');
            $table->boolean('wednesdayOpenMorning')->default('0');
            $table->boolean('wednesdayOpenNigth')->default('0');
            $table->time('thursdayMorning1')->default('0');
            $table->time('thursdayMorning2')->default('0');
            $table->time('thursdayNigth1')->default('0');
            $table->time('thursdayNigth2')->default('0');
            $table->boolean('thursdayOpenMorning')->default('0');
            $table->boolean('thursdayOpenNigth')->default('0');
            $table->time('fridayMorning1')->default('0');
            $table->time('fridayMorning2')->default('0');
            $table->time('fridayNigth1')->default('0');
            $table->time('fridayNigth2')->default('0');
            $table->boolean('fridayOpenMorning')->default('0');
            $table->boolean('fridayOpenNigth')->default('0');
            $table->time('saturdayMorning1')->default('0');
            $table->time('saturdayMorning2')->default('0');
            $table->time('saturdayNigth1')->default('0');
            $table->time('saturdayNigth2')->default('0');
            $table->boolean('saturdayOpenMorning')->default('0');
            $table->boolean('saturdayOpenNigth')->default('0');
            $table->time('sundayMorning1')->default('0');
            $table->time('sundayMorning2')->default('0');
            $table->time('sundayNigth1')->default('0');
            $table->time('sundayNigth2')->default('0');
            $table->boolean('sundayOpenMorning')->default('0');
            $table->boolean('sundayOpenNigth')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
