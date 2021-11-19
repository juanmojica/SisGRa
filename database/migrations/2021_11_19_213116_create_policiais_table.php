<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliciaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policiais', function (Blueprint $table) {
            $table->id();
            $table->string('st_nome', 100);
            $table->string('st_matricula', 10)->unique();
            $table->string('st_nome_guerra', 30);
            $table->string('st_posto/grad', 30);
            $table->string('st_unidade', 100);
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
        Schema::dropIfExists('policiais');
    }
}
