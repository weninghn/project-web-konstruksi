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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->date('work_date');
            $table->date('date_end');
            $table->string('name',255);
            $table->string('location',255);
        //   $table->date('date_offer');  
            // $table->unsignedBigInteger('offer-id');
            // $table->foreign('offer-id')->references('id')->on('offers');
            // $table->unsignedBigInteger('payments');
            // $table->foreign('payments')->references('id')->on('payments');
            // $table->string('status',255);
            // $table->string('status_payment',255); 
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
        Schema::dropIfExists('project');
    }
};