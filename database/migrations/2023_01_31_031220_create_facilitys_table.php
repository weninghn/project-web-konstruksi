<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilitys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detail_offer_id');
            $table->foreign('detail_offer_id')->references('id')->on('detail_offers');
            $table ->string('nama',255);
            // $table->string('category');
            $table->integer('quantity');
            $table->integer('price');
            // $table->string('total');
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
        Schema::dropIfExists('facilitys');
    }
};