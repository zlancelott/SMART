<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOvenDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oven_data', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reader_data_id');
            $table->text('data');
            $table->timestamps();

            $table->foreign('reader_data_id')
                  ->references('id')->on('reader_datas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oven_data');
    }
}
