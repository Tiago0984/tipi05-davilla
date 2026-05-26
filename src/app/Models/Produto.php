<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Produto extends Model
{

    protected $table = 'tbl_produtos';

    protected $primaryKey = 'id_produto';

    public $timestamps = true;

    const UPDATED_AT = 'atualizado_em_produto';

    const CREATED_AT = 'criado_em_produto';

    protected $fillable = [
        'nome_produto',
        'slug_produto',
        'id_categoria',
        'id_produto',
        'descricao_produto',
        'status_produto',
        'ordem_produto',
        'valor_produto',
        'foto_produto',
        'destaque_produto',
        'tamanho_produto',
        'unid_medida_produto',

    ];

    // Relacionamento um produto pertence a uma categoria
    // belongsTo: pertence a, tem uma chave estrangeira
    public function CategoriaProduto()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }
}
