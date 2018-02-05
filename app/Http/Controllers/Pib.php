<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model as Model;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Illuminate\Support\Facades\DB;

class Pib extends Controller
{
    public function viewPrincipal()
    {
    	$dados['pais'] = Model\Pais::sltPaises();
        $dados['activeHome'] = "active";

    	return view('pib', $dados);
    }

    public function alterarPib()
    {
        $dados['pib'] = Model\Pib::sltPibPais();
        $dados['activeAlterarPib'] = "active";

        return view('alterar-pib', $dados);   
    }

    public function aterarPibValidar(Request $request)
    {
        $dados = $request->except('_token');

        //validando os campos
        $rules = array(
            'consumo' => 'required|numeric',
            'investimento' => 'required|numeric',
            'gastosGoverno' => 'required|numeric',
            'exportacoes' => 'required|numeric',
            'importacoes' => 'required|numeric',
            'ano' => 'required|max:2018|digits:4|numeric',
            'id' => 'required|numeric',
        );

        //verificando se os campos são validos
        $validator = Validator::make($dados, $rules);
        if($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
            ->withErrors($validator);
        }

        $verify = DB::table('pib')
            ->where('ano', '=', $dados['ano'])
            ->where('idPais', '=', $dados['idPais'])
            ->where('id', '!=', $dados['id'])
            ->get()->toArray();
        
        if (empty($verify)) {
            $id = $dados['id'];
            unset($dados['id']);
            unset($dados['idPais']);

            $result = DB::table('pib')
                ->where('id', $id)
                ->update($dados);    
        }        

        if (isset($result) && $result == true) {
            return redirect()
                ->route('alterarPib')
                ->with(
                    'success',
                    'Pib Alterado com Sucesso!'
            );            
        }else {
            return redirect()
                ->route('alterarPib')
                ->with(
                    'error',
                    'Não foi possivel Altarar o PIB ou Já foi Alterado!'
            );            
        }
    }

    public function deletarPib($idPib)
    {
        if (!empty($idPib)) {
            $result = Model\Pib::deletarPib($idPib);   
        }else {
            return redirect()
                ->route('alterarPib')
                ->with(
                    'error',
                    'Não foi possivel deletar o PIB!'
            );
        }

        if ($result == true) {
            return redirect()
                ->route('alterarPib')
                ->with(
                    'success',
                    'Pib Deletado com Sucesso!'
            );            
        }else {
            return redirect()
                ->route('alterarPib')
                ->with(
                    'error',
                    'Não foi possivel deletar o PIB!'
            );            
        }
    }

    public function pibValidar(Request $request)
    {
        //Pegando os dados
        $dados = $request->except('_token');

        //validando os campos
        $rules = array(
            'consumo' => 'required|numeric',
            'investimento' => 'required|numeric',
            'gastosGoverno' => 'required|numeric',
            'exportacoes' => 'required|numeric',
            'importacoes' => 'required|numeric',
            'idPais' => 'required|numeric',
            'ano' => 'required|max:2018|digits:4|numeric',
        );

        //verificando se os campos são validos
        $validator = Validator::make($dados, $rules);
        if($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
            ->withErrors($validator);
        }

        $verify = DB::table('pib')
            ->where([
                'idPais' => $dados['idPais'],
                'ano' => $dados['ano']
            ])->get()->toArray();


        if (empty($verify)) {
            $result = Model\Pib::insPib($dados);    
        }

        if (isset($result) && $result === true) {
            return redirect()
                ->route('home')
                ->with(
                    'success',
                    'Dados do PIB inseridos com sucesso!'
                );   
        } else {
            return redirect()
                ->route('home')
                ->with(
                    'error',
                    'Dados do PIB não foram inseridos!'
                );            
        }
    }

    public function pibGrafico()
    {
        $dados['anoPib'] = Model\Pib::sltAnoPib();
        $dados['paisPib'] = Model\Pais::sltPaisesPib();
        $dados['activeGraficos'] = "active";

    	return view('graficos', $dados);
    }

    public function grafico($ano)
    {
    	echo Model\Pib::sltPib($ano);
    }

    public function graficoPer($ano)
    {
        echo Model\Pib::sltPibPerCapita($ano);
    }

    public function selectPibPorIdModel($id)
    {
        return Model\Pib::selectPibPorId($id);
    }
}
