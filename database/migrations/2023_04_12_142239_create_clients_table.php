<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('c_client')->unique()->nullable();
            $table->string('nom_client');
            $table->string('societe');
            $table->string('tele_client');
            $table->string('tele_client2')->nullable();
            $table->string('ville');
            $table->string('region');
            $table->string('localisation');
            $table->string('game_commercialise')->nullable();
            $table->string('marque_commercialise')->nullable();
            $table->string('fournisseur')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('clients');
    }
};
