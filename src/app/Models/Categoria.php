<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table = 'tbl_categorias'; 

    protected $primaryKey = 'id_categoria';

    public $timestamps = true;

    const UPDATE_AT = 'atualizado_em_categoria';

    const CREATED_AT = 'criado_em_categoria';

    protected $fillable = [
        'nome_categoria',
        'descricao_categoria',
    ];
}
