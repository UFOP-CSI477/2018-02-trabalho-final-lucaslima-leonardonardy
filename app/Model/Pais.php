<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pais extends Model
{
    public static function sltPaises()
    {
    	return DB::table('pais')->select(
    		'id',
    		'pais'
    	)->get()->toArray();
    }

    public static function sltPaisesCompleto()
    {
    	return DB::table('pais')->select(
    		'id',
    		'populacao',
    		'pais'
    	)->get()->toArray();
    }

    public static function sltPaisesPib()
    {
        return DB::table('pais')->select(
            'pais'
        )->get()->toArray();        
    }
}
