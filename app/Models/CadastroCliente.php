<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CadastroCliente extends Model
{
    use HasFactory;
    protected $fillable=[
        'nome',
        'telefone',
        'email',
        'cpf',
        'endereco',
        'password',
        'imagem',
    
    ];

}
