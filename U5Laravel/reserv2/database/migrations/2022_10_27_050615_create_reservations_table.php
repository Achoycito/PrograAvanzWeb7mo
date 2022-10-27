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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            // $table->foreign('client_id')->references('id')->on('clients');
            // $table->foreign('id_room')->references('id')->on('rooms');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('total', 10, 2); //10 digitos en total, 2 despues del punto

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
        Schema::dropIfExists('reservations');
    }
};
