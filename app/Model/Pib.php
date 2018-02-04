<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pib extends Model
{
    public static function sltPib()
    {
    	return DB::table('calculo_pib')->select(
    		'totalPib',
    		'pais'
    	)->get()->toJson();
    }

    public static function sltPibPerCapita()
    {
    	return DB::table('calculo_pib_per_capita')->select(
    		'totalPib',
    		'pais'
    	)->get()->toJson();
    }

    public static function insPib($dados)
    {
        return DB::table('pib')->insert($dados);
    }

    public static function sltPibPais()
    {
        return DB::table('pib')
            ->join('pais', 'pib.idPais', '=', 'pais.id')
            ->select(
                'pib.consumo',
                'pib.investimento',
                'pib.gastosGoverno',
                'pib.exportacoes',
                'pib.importacoes',
                'pib.ano',
                'pais.pais',
                'pib.idPais',
                'pib.id'
            )->orderBy('pib.id')
        ->get()->toArray();
    }

    public static function deletarPib($idPib)
    {
        return DB::table('pib')
            ->where('id', '=', $idPib)->delete();
    }

    public static function selectPibPorId($idPib)
    {
        return DB::table('pib')
            ->where('id', '=', $idPib)->get()->toJson();        
    }
}
