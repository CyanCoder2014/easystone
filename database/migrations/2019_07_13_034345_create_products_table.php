<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('factory_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('surface_id')->nullable();
            $table->unsignedBigInteger('quality_id')->nullable();
            $table->unsignedBigInteger('source_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('factory_id')->references('id')->on('factories')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('set null');
            $table->foreign('surface_id')->references('id')->on('surfaces')->onDelete('set null');
            $table->foreign('quality_id')->references('id')->on('qualities')->onDelete('set null');
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('set null');
            $table->string('name');
            $table->text('images_sample');
            $table->text('images_worked');
            $table->text('description');
            $table->unsignedInteger('status')->default(0);
            $table->timestamp('expired_at');
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
        Schema::dropIfExists('products');
    }
}
