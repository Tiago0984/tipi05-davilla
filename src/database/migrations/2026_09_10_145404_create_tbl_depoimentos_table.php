<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * id_depoimento
     * id_cliente
     * texto_depoimento
     * nota_depoimento
     * status_depoimento
     * criado_em_depoimento
     * atualizado_em_depoimento
     */
    public function up(): void
    {
        Schema::create('tbl_depoimentos', function (Blueprint $table) {
            $table->integer('id_depoimento')->autoIncrement();

            $table->integer('id_cliente');
            $table->text('texto_depoimento');
            $table->tinyInteger('nota_depoimento');
            $table->string('status_depoimento', 20)->default('PENDENTE');
            $table->dateTime('criado_em_depoimento')->useCurrent();
            $table->dateTime('atualizado_em_depoimento')->useCurrentOnUpdate()->useCurrent();

            /* id_cliente ------1------- tbl_depoimentos ------N------ id_depoimento */

            $table->foreign('id_cliente', 'fk_depoimento_cliente')
            ->references('id_cliente')
            ->on('tbl_clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_depoimentos');
    }
};
