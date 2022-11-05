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
        Schema::create('cars', function (Blueprint $table) {
                $table->id();
                $table->string('brand');
                $table->string('model');
                $table->string('color');
                $table->string('car_number')->unique();
                $table->boolean('status_flag');
                $table->timestamps();

                $table->unsignedInteger('clients_id');

                $table->index('clients_id', 'cars_clients_idx');

                $table->foreign('clients_id','cars_clients_fk')->on('clients')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
