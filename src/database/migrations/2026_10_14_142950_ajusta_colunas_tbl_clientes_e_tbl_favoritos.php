<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Alinha bancos criados antes das correções nas migrations de criação:
     * telefone_cliente   varchar(14) -> varchar(15)
     * foto_cliente       NOT NULL    -> nullable
     * criado_em_favorito integer     -> dateTime
     * created_at / updated_at removidos de tbl_favoritos
     */
    public function up(): void
    {
        Schema::table('tbl_clientes', function (Blueprint $table) {
            $table->string('telefone_cliente', 15)->change();
            $table->string('foto_cliente', 60)->nullable()->change();
        });

        Schema::table('tbl_favoritos', function (Blueprint $table) {
            $table->dateTime('criado_em_favorito')->useCurrent()->change();
        });

        if (Schema::hasColumn('tbl_favoritos', 'created_at')) {
            Schema::table('tbl_favoritos', function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Sem volta: as versões antigas eram erros de modelagem.
    }
};
