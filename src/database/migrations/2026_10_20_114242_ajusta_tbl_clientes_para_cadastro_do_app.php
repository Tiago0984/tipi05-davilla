<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * O cadastro do app só pede nome, e-mail, telefone e senha.
     * termo_aceito_em_cliente: data/hora do aceite do termo de consentimento
     * tipo, CPF/CNPJ, nascimento e endereço passam a aceitar nulo
     */
    public function up(): void
    {
        Schema::table('tbl_clientes', function (Blueprint $table) {
            $table->dateTime('termo_aceito_em_cliente')->nullable()->after('status_cliente');

            $table->string('tipo_cliente', 2)->nullable()->change();
            $table->string('cpf_cnpj_cliente', 18)->nullable()->change();
            $table->date('data_nasc_cliente')->nullable()->change();
            $table->string('endereco_cliente', 40)->nullable()->change();
            $table->string('numero_cliente', 6)->nullable()->change();
            $table->string('bairro_cliente', 40)->nullable()->change();
            $table->string('cidade_cliente', 40)->nullable()->change();
            $table->string('uf_cliente', 2)->nullable()->change();
            $table->string('cep_cliente', 9)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Volta só a coluna nova: tornar NOT NULL de novo falharia com clientes do app
        Schema::table('tbl_clientes', function (Blueprint $table) {
            $table->dropColumn('termo_aceito_em_cliente');
        });
    }
};
