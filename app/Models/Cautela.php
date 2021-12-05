<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cautela extends Model
{
    use HasFactory;

    protected $fillable = [
        'dt_recebimento',
        'st_assinou_recebimento',
        'dt_devolucao',
        'st_assinou_devolucao',
        'st_observacao',
        'policial_id',
        'radio_id',
    ];

    public function rules() {
        return [
            'dt_recebimento' => 'required',
            'st_assinou_recebimento' => 'required',
        ];
    } 

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório.',
        ];
    }

    public function policial() {
        return $this->belongsTo('App\Models\Policial');
    }

    public function radio() {
        return $this->belongsTo('App\Models\Radio');
    }

}
