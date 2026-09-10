<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * id_endereco
     * id_cupom
     * forma_pagamento_venda
     * entrega_venda
     * observacao_venda
     * valor_desconto_venda
     */
    public function up(): void
    {
        Schema::table('tbl_vendas', function (Blueprint $table) {
            $table->integer('id_endereco')->nullable();
            $table->integer('id_cupom')->nullable();
            $table->string('forma_pagamento_venda', 10)->nullable();
            $table->string('entrega_venda', 3)->nullable();
            $table->text('observacao_venda')->nullable();
            $table->decimal('valor_desconto_venda', 10, 2)->default(0);

            $table->foreign('id_endereco', 'fk_venda_endereco')
            ->references('id_endereco')
            ->on('tbl_enderecos_cliente');

            $table->foreign('id_cupom', 'fk_venda_cupom')
            ->references('id_cupom')
            ->on('tbl_cupons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_vendas', function (Blueprint $table) {
            $table->dropForeign('fk_venda_cupom');
            $table->dropForeign('fk_venda_endereco');

            $table->dropColumn([
                'id_endereco',
                'id_cupom',
                'forma_pagamento_venda',
                'entrega_venda',
                'observacao_venda',
                'valor_desconto_venda',
            ]);
        });
    }
};
