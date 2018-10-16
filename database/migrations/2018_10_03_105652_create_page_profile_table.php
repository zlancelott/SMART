<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id');
            $table->integer('page_id');
            $table->smallInteger('consult')->default(0);
            $table->smallInteger('register')->default(0);
            $table->smallInteger('edit')->default(0);
            $table->smallInteger('delete')->default(0);

            $table->foreign('profile_id')
                  ->references('id')->on('profiles')
                  ->onDelete('cascade');

            $table->foreign('page_id')
                  ->references('id')->on('pages')
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
        Schema::dropIfExists('page_profile');
    }
}
