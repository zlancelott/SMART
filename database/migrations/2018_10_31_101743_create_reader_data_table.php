<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReaderDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reader_data', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reader_id');
            $table->date('date');
            $table->text('code');
            $table->timestamps();

            $table->foreign('reader_id')
                  ->references('id')->on('readers')
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
        Schema::dropIfExists('reader_data');
    }
}
