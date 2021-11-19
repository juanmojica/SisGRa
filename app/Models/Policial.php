<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
