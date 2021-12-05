<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCautelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cautelas', function (Blueprint $table) {
            $table->id();
            $table->date('dt_recebimento');
            $table->date('dt_devolucao');
            $table->string('st_observacao', 300);
            $table->timestamps();

            //foreign key (constraints)
            $table->foreignId('policial_id')->constrained('policiais');
            $table->foreignId('radio_id')->constrained('radios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remove relacionamento com a tabela radios
        Schema::table('cautelas', function (Blueprint $table){
            //remove a foreign key
            $table->dropForeign('cautelas_radio_id_foreign');
            //remove a coluna
            $table->dropColumn('radio_id');
        });
        
        //remove relacionamento com a tabela policiais
        Schema::table('cautelas', function (Blueprint $table){
            //remove a foreign key
            $table->dropForeign('cautelas_policial_id_foreign');
            //remove a coluna
            $table->dropColumn('policial_id');
        });
        
        Schema::dropIfExists('cautelas');
    }
}
