<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalculoPibPerCapitaView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE  OR REPLACE VIEW `calculo_pib_per_capita` AS SELECT ((
                p.consumo + p.investimento + p.gastosGoverno + (
                    p.exportacoes - p.importacoes
                )
            ) / pa.populacao) AS totalPib, pa.pais, p.ano FROM pib AS p
            INNER JOIN pais AS pa ON p.idPais = pa.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW calculo_pib_per_capita");
    }
}
