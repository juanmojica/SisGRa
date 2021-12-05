<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Policial extends Model
{
    use HasFactory;

    protected $table = 'policiais';

    protected $fillable = [
        'st_nome', 
        'st_matricula', 
        'st_nome_guerra', 
        'st_posto/grad', 
        'st_unidade'
    ];

    public function rules(){
        return [
            'nome' => 'required', 
            'matricula' => 'required|min:3|max:10|unique:policiais,st_matricula,'.$this->id, 
            'nome_guerra' => 'required', 
            'posto_grad' => 'required', 
            'unidade' => 'required',
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute deve ter no mínimo 3 caracteres.',
            'max' => 'O campo :attribute deve ter no máximo 10 caracteres.',
            'unique' => 'A :attribute informada já está cadastrada para outro usuário.',
        ];
    }

    public function cautelas() {
        return $this->hasMany('Cautela');
    }

}
