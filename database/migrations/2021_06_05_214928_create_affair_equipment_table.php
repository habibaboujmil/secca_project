<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffairEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affair_equipment', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->nullable();;
            $table->string('designation')->nullable();
            $table->decimal('unit_price',8,2)->unsigned()->nullable();
            $table->integer('quantity')->nullable();
            $table->text('note')->nullable();
            $table->integer('affair_id')->unsigned();
            $table->foreign('affair_id')->references('id')->on('affairs')->onDelete('cascade');
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
        Schema::dropIfExists('affair_equipment');
    }
}
