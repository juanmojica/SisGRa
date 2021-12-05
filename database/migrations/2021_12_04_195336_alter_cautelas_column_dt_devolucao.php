<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCautelasColumnDtDevolucao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cautelas', function (Blueprint $table) {
            $table->date('dt_devolucao')->nullable()->change();
            $table->string('st_observacao', 300)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('dt_devolucao')->change();
            $table->string('st_observacao', 300)->change();
        });
    }
}
