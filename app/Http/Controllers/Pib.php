<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model as Model;
use Symfony\Component\HttpFoundation\Response;

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
    	return view('graficos');
    }

    public function grafico(Response $response)
    {
    	echo Model\Pib::sltPib();
    }

    public function graficoPer(Response $response)
    {
        echo Model\Pib::sltPibPerCapita();
    }
}
