<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCautelasAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cautelas', function (Blueprint $table) {
            $table->string('st_assinou_recebimento', 10)->after('dt_recebimento');
            $table->string('st_assinou_devolucao', 10)->nullable()->after('dt_devolucao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cautelas', function (Blueprint $table) {
            $table->dropColumn('st_assinou_devolucao');
            $table->dropColumn('st_assinou_recebimento');
        });
    }
}
