<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('stockQuantity');
            $table->integer('rayQuantity');
            $table->unsignedBigInteger('ray_id')->index();
            $table->unsignedBigInteger('author_id')->index();
            $table->unsignedBigInteger('discType_id')->index();
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
        Schema::dropIfExists('discs');
    }
}
