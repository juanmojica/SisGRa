<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radios', function (Blueprint $table) {
            $table->id();
            $table->string('st_tipo', 50);
            $table->string('st_fabricante', 50);
            $table->string('st_modelo', 50);
            $table->string('st_tombo', 50)->unique();
            $table->string('st_num_serie', 50)->unique();
            $table->string('st_num_id', 50)->unique();
            $table->string('st_status', 30);
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
        Schema::dropIfExists('radios');
    }
}
