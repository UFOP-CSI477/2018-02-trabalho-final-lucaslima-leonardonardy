<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pib extends Model
{
    public static function sltPib($anoPais)
    {
        if (is_numeric($anoPais)) {
            $where = 'ano';    
        }elseif (is_string($anoPais)) {
            $where = 'pais';
        }         
        // var_dump($anoPais, $where); die();
    	return DB::table('calculo_pib')->select(
    		'totalPib',
    		DB::raw("CONCAT(pais, '-',pais) AS pais")
    	)
        ->where($where, '=', $anoPais)
        ->get()->toJson();
    }

    public static function sltPibPerCapita($anoPais)
    {
        if (is_numeric($anoPais)) {
            $where = 'ano';    
        }elseif (is_string($anoPais)) {
            $where = 'pais';
        }

    	return DB::table('calculo_pib_per_capita')->select(
    		'totalPib',
    		DB::raw("CONCAT(pais, '-',ano) AS pais")
    	)
        ->where($where, '=', $anoPais)
        ->get()->toJson();
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

    public static function sltAnoPib()
    {
        return DB::table('pib')
            ->select('ano')
            ->groupBy('ano')
            ->get()->toArray();        
    }
}
