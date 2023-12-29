<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contest_dogs', function (Blueprint $table) {
            $table->id();
            $table->integer('contest_id'); // Tipul de date trebuie să corespundă cu cel al coloanei `id` din tabela `events`
            $table->integer('dog_id'); // La fel aici, trebuie să corespundă cu coloana `id` din tabela `speakers`
            $table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
            $table->foreign('dog_id')->references('id')->on('dogs')->onDelete('cascade');
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contest_dogs');
    }
};
