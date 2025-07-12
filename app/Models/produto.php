<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produto extends Model
{
    use HasFactory;
    
    protected $table = 'produto'; // Nome da tabela no banco de dados
    protected $fillable = ['nome', 'categoria', 'descricao', 'precoUnitario', 'quantEstoque']; // Atributos que podem ser preenchidos em massa

    /**
     * Indica ao Laravel para gerenciar as colunas created_at e updated_at.
     */
    public $timestamps = true; // Definido como true para permitir o gerenciamento automático de timestamps
}
