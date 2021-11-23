<?php

namespace App\Http\Controllers;

use App\Models\Radio;
use Illuminate\Http\Request;

class RadioController extends Controller
{
    
    public function __construct(Radio $radio) {
        $this->radio = $radio;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        return response()->json($this->radio->all(), 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
         //valida os campos enviados na requisição
         $request->validate($this->radio->rules(), $this->radio->feedback());
        
         $radio = $this->radio->create([
             'st_tipo' => $request->tipo,
             'st_fabricante' => $request->fabricante,
             'st_modelo' => $request->modelo,
             'st_tombo' => $request->tombo,
             'st_num_serie' => $request->num_serie,
             'st_num_id' => $request->num_id,
             'st_status' => $request->status,
         ]);
 
         return response()->json($radio, 201);
     
     }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
        $radio = $this->radio->find($id);

        if ($radio === null) {
            return response()->json(['erro' => 'O recurso solicitado não existe.'], 404);
        }

        return response()->json($radio, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $radio = $this->radio->find($id);

        //verifica se o radio pesquisado existe no banco
        if ($radio === null) {
            return response()->json(['erro' => 'Impossível atualizar! O recurso solicitado não existe.'], 404);
        }

        //valida os campos enviados na requisição
        $request->validate($radio->rules(), $radio->feedback());

        $radio->update([
            'st_tipo' => $request->tipo,
            'st_fabricante' => $request->fabricante,
            'st_modelo' => $request->modelo,
            'st_tombo' => $request->tombo,
            'st_num_serie' => $request->num_serie,
            'st_num_id' => $request->num_id,
            'st_status' => $request->status,
        ]);

        return response()->json($radio, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
        $radio = $this->radio->find($id);
        
        //verifica se o radio pesquisado existe no banco
        if ($radio === null) {
            return response()->json(['erro' => 'Impossível excluir! O recurso solicitado não existe.'], 404);
        }

        $radio->delete();
        return response()->json(['msg' => 'radio deletado com sucesso'], 200);
    
    }

}
