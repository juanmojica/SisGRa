<?php

namespace App\Http\Controllers;

use App\Models\Cautela;
use Illuminate\Http\Request;

class CautelaController extends Controller
{
    public function __construct(Cautela $cautela){
        $this->cautela = $cautela;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $cautela = $this->cautela
                    ->with('policial:id,st_matricula,st_nome_guerra,st_posto/grad,st_unidade') 
                    ->with('radio:id,st_tipo,st_fabricante,st_modelo,st_tombo,st_num_serie,st_num_id,st_status')
                    ->get();

        return response()->json($cautela, 200);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       
        //valida os campos enviados na requisição
        $request->validate($this->cautela->rules(), $this->cautela->feedback());

        //verifica se a dt_devolucao é null e caso não seja converte a data para o padrão americano
        $dt_devolucao = ($request->dt_devolucao == null ? null : date_create_from_format("d/m/Y", $request->dt_devolucao)->format("Y/m/d"));
        
        $cautela = $this->cautela->create([
            'dt_recebimento'=> date_create_from_format("d/m/Y", $request->dt_recebimento)->format("Y/m/d"),
            'st_assinou_recebimento' => $request->st_assinou_recebimento,
            'dt_devolucao'=> $dt_devolucao,
            'st_assinou_devolucao'=> $request->st_assinou_devolucao,
            'st_observacao'=> $request->observacao,
            'policial_id'=> $request->idPolicial,
            'radio_id'=> $request->idRadio,
        ]);

        return response()->json($cautela, 201);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $cautela = $this->cautela->selectRaw('id,dt_recebimento,st_assinou_recebimento,dt_devolucao,st_assinou_devolucao,st_observacao,policial_id,radio_id')
            ->with('policial:id,st_matricula,st_nome_guerra,st_posto/grad,st_unidade') 
            ->with('radio:id,st_tipo,st_fabricante,st_modelo,st_tombo,st_num_serie,st_num_id,st_status')
            ->find($id);

         //verifica se o cautela pesquisado existe no banco
        if ($cautela === null) {
            return response()->json(['erro' => 'O recurso solicitado não existe.'], 404);
        }

        return response()->json($cautela, 200);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $cautela = $this->cautela->find($id);

        //verifica se o cautela pesquisado existe no banco
        if ($cautela === null) {
            return response()->json(['erro' => 'Impossível atualizar! O recurso solicitado não existe.'], 404);
        }

        //valida os campos enviados na requisição
        $request->validate($cautela->rules(), $cautela->feedback());

        $cautela = $this->cautela->create([
            'dt_recebimento'=> date_create_from_format("d/m/Y", $request->dt_recebimento)->format("Y/m/d"),
            'st_assinou_recebimento' => $request->st_assinou_recebimento,
            'dt_devolucao'=> date_create_from_format("d/m/Y", $request->dt_devolucao)->format("Y/m/d"),
            'st_assinou_devolucao'=> $request->st_assinou_devolucao,
            'st_observacao'=> $request->observacao,
            'policial_id'=> $request->idPolicial,
            'radio_id'=> $request->idRadio,
        ]);

        return response()->json($cautela, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $cautela = $this->cautela->find($id);
        
        //verifica se o cautela pesquisado existe no banco
        if ($cautela === null) {
            return response()->json(['erro' => 'Impossível excluir! O recurso solicitado não existe.'], 404);
        }

        $cautela->delete();
        return response()->json(['msg' => 'cautela deletado com sucesso'], 200);

    }
}
