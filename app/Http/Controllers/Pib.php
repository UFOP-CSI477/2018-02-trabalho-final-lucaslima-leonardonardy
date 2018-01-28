<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model as Model;

class Pib extends Controller
{
    public function viewPrincipal()
    {
    	$dados['pais'] = Model\Pais::sltPaises();

    	return view('pib', $dados);
    }

    public function pibValidar()
    {
    	var_dump("Não implementado"); die();
    }

    public function pibGrafico()
    {
    	var_dump("Não implementado"); die();
    }
}
