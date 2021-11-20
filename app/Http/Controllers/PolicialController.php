<?php

namespace App\Http\Controllers;

use App\Models\Policial;
use Illuminate\Http\Request;

class PolicialController extends Controller
{
    public function __construct(Policial $policial){
        $this->policial = $policial;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $policiais = $this->policial->all();

        return response()->json($policiais, 200);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        //valida os campos enviados na requisição
        $request->validate($this->policial->rules(), $this->policial->feedback());

        $policial = $this->policial->create($request->all());

        return response()->json($policial, 201);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $policial = $this->policial->find($id);

         //verifica se o policial pesquisado existe no banco
        if ($policial === null) {
            return response()->json(['erro' => 'O recurso solicitado não existe.'], 404);
        }

        return response()->json($policial, 200);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $policial = $this->policial->find($id);

        //verifica se o policial pesquisado existe no banco
        if ($policial === null) {
            return response()->json(['erro' => 'Impossível atualizar! O recurso solicitado não existe.'], 404);
        }

        //valida os campos enviados na requisição
        $request->validate($policial->rules(), $policial->feedback());

        $policial->update($request->all());

        return response()->json($policial, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $policial = $this->policial->find($id);
        
        //verifica se o policial pesquisado existe no banco
        if ($policial === null) {
            return response()->json(['erro' => 'Impossível excluir! O recurso solicitado não existe.'], 404);
        }

        $policial->delete();
        return response()->json(['msg' => 'policial deletado com sucesso'], 200);

    }
}
