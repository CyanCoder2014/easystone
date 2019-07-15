<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('province_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('manager');
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('address',512)->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('background_img')->nullable();
            $table->text('images')->nullable();
            $table->text('licences')->nullable();
            $table->double('lng',10,8)->nullable();
            $table->double('lat',10,8)->nullable();
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
        Schema::dropIfExists('factories');
    }
}
