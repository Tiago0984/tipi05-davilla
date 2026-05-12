<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
   // Indica o nome exato da tabela no banco de dados
    protected $table = 'tbl_banner';

    // Indica o nome da chave primária
    protected $primaryKey = 'id_banner';

    // Se a tabela não tiver as colunas 'created_at' e 'updated_at'
    public $timestamps = true;
}
