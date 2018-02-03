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
}
