<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuario'; // Nome da tabela no banco de dados
    protected $fillable = ['nome', 'senha', 'email']; // Atributos que podem ser preenchidos em massa

    /**
     * Indica ao Laravel para não gerenciar as colunas created_at e updated_at.
     */
    public $timestamps = false;
    
}
