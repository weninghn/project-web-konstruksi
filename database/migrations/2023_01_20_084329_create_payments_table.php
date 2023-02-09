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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('project_id');
            // $table->foreign('project_id')->references('id')->on('projects');
            $table->unsignedBigInteger('payment_method_id');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->string('amount_payment',255);
            $table->date('payment_date');
            $table->boolean('payment_to')->default(0);
            // $table->string('status');
            $table->boolean('status')->default(0);
            $table->string('note');
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
        Schema::dropIfExists('payments');
    }
};