<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('challenge_id')->unsigned()->nullable();
            $table->foreign('challenge_id')->references('id')->on('challenges');

            $table->timestamp('completed_on');

            $table->timestamps();

            $table->index(['created_at', 'completed_on']);
            $table->unique(['user_id', 'challenge_id'], 'user_id_challenge_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_challenges');
    }
}
