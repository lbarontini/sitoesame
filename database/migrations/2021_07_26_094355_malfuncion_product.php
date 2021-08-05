<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MalfuncionProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('malfunction_product', function (Blueprint $table) {

            //$table->bigIncrements('id');
            $table->unsignedBigInteger('malfunction_id');
            $table->unsignedBigInteger('product_id');
            //$table->timestamps();

            $table->unique(['malfunction_id','product_id']);
            $table->foreign('malfunction_id')->references('id')->on('malfunctions')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('malfunction_product');
    }
}
