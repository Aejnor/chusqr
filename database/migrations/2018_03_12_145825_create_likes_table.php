<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('chusqr_id')->unsigned();
            $table->timestamps();

            $table->primary(['user_id', 'chusqr_id']);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('chusqr_id')->references('id')->on('chusqers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
