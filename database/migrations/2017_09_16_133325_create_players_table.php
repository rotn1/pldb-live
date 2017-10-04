<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fantaname', 155);
            $table->string('name', 155)->default(' ');
            $table->string('surname', 155);
            $table->string('position', 3);
            $table->char('role1', 2);
            $table->char('role2', 2)->nullable();
            $table->char('role3', 2)->nullable();
            $table->integer('team');
            $table->integer('fantateam')->nullable();
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
        Schema::dropIfExists('players');
    }
}
