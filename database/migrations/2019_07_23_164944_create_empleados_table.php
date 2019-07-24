<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('First_name', 100);
            $table->string('Last_name', 100);
           // $table->unsignedInteger('compania');

            $table->string('Email', 100);
            $table->integer('phone');
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companias');
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
        Schema::dropIfExists('empleados');
    }
}
