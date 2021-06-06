<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffairMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affair_material', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('affair_id')->unsigned();
            $table->bigInteger('material_id')->unsigned();
            $table->Integer('quantity')->unsigned()->nullable();
            $table->decimal('unit_price',8,2)->unsigned()->nullable();
            $table->decimal('total_price',8,2)->unsigned()->nullable();
            $table->foreign('affair_id')->references('id')->on('affairs');
            $table->foreign('material_id')->references('id')->on('materials');
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
        Schema::dropIfExists('affair_material');
    }
}
