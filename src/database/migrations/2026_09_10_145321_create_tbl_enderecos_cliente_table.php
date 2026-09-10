<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * id_endereco
     * id_cliente
     * nome_endereco
     * endereco
     * numero
     * complemento
     * bairro
     * cidade
     * uf
     * cep
     * principal_endereco
     * status_endereco
     * criado_em_endereco
     * atualizado_em_endereco
     */
    public function up(): void
    {
        Schema::create('tbl_enderecos_cliente', function (Blueprint $table) {
            $table->integer('id_endereco')->autoIncrement();

            $table->integer('id_cliente');
            $table->string('nome_endereco', 40);
            $table->string('endereco', 40);
            $table->string('numero', 6);
            $table->string('complemento', 50)->nullable();
            $table->string('bairro', 40);
            $table->string('cidade', 40);
            $table->string('uf', 2);
            $table->string('cep', 9);
            $table->boolean('principal_endereco')->default(false);
            $table->string('status_endereco', 20)->default('ATIVO');
            $table->dateTime('criado_em_endereco')->useCurrent();
            $table->dateTime('atualizado_em_endereco')->useCurrentOnUpdate()->useCurrent();

            /* id_cliente ------1------- tbl_enderecos_cliente ------N------ id_endereco */

            $table->foreign('id_cliente', 'fk_endereco_cliente')
            ->references('id_cliente')
            ->on('tbl_clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_enderecos_cliente');
    }
};
