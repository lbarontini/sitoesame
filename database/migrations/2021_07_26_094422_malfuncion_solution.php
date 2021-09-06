<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MalfuncionSolution extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('malfunction_solution', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('malfunction_id');
            $table->unsignedBigInteger('solution_id');
            $table->timestamps();

            //$table->unique(['malfunction_id','solution_id']);
            $table->foreign('malfunction_id')->references('id')->on('malfunctions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('solution_id')->references('id')->on('solutions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('malfunction_solution');
    }
}
