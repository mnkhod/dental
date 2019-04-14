<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->increments('id');
            //1->Lombo
            //2->Shudiig yasan shud bolgono
            $table->string('name');
            $table->integer('selection_type');
            //0-Buh shud n deer
            //1-Neg shud n deer
            //2-1ees ikh shud n deer
            $table->tinyInteger('category');
            //0-Emchilgee
            //1-Gajig zasal
            //2-Sogog zasal
            //3-Mes zasal
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('treatments');
    }
}
