<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeMsgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_msgs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('homeMessage')->nullable();
            $table->string('homeMessageTitle')->nullable();
            $table->boolean('isActived')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_msgs');
    }
}
