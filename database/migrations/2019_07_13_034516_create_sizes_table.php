<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('type_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('type_sizes')->onDelete('cascade');
            $table->unsignedDecimal('length')->nullable();
            $table->unsignedDecimal('height')->nullable();
            $table->unsignedDecimal('width')->nullable();
            $table->unsignedDecimal('tonnage')->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedInteger('unit_price');
            $table->unsignedSmallInteger('off')->nullable();
            $table->smallInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizes');
    }
}
