<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radio extends Model
{
    use HasFactory;

    protected $fillable = [
        'st_tipo',
        'st_fabricante',
        'st_modelo',
        'st_tombo',
        'st_num_serie',
        'st_num_id',
        'st_status',
    ];

    public function rules() {
        return [
            'tipo' => 'required',
            'fabricante' => 'required',
            'modelo' => 'required',
            'tombo' => 'required|unique:radios,st_tombo,'.$this->id,
            'num_serie' => 'required|unique:radios,st_num_serie,'.$this->id,
            'num_id' => 'required|unique:radios,st_num_id,'.$this->id,
            'status' => 'required',
        ];
    } 

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'unique' => ':attribute informado já está cadastrado em outro rádio.',
        ];
    }
}
