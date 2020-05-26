<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_treatments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('checkin_id');
            $table->integer('treatment_id');
            $table->integer('treatment_selection_id')->nullable();
            $table->integer('tooth_id')->nullable();
            $table->integer('value')->nullable();
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
        Schema::dropIfExists('user_treatments');
    }
}
