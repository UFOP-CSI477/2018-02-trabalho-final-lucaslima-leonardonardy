<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model as Model;

class Pais extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function gerenciarPais()
    {
    	$dados['pais'] = Model\Pais::sltPaisesCompleto();
        $dados['activePais'] = "active";

        return view('alterar-pais', $dados);
    }

    public function deletarPais($id)
    {
    	$dados['activePais'] = "active";

    	$result = DB::table('pais')
    		->where('id', $id)->delete();

        if ($result == true) {
            return redirect()
                ->route('gerenciarPais')
                ->with(
                    'success',
                    'Pais Deletado Sucesso!'
            );            
        }else {
            return redirect()
                ->route('gerenciarPais')
                ->with(
                    'error',
                    'O Pais não foi Deletado!'
            );            
        }
    }

    public function cadastrarPais(Request $request)
    {
    	$dados = $request->except('_token');

    	$dados['pais'] = ucfirst(strtolower($dados['pais'])); 

    	$pais = DB::table('pais')
    		->where('pais', $dados['pais'])->get()->toArray();

    	if (empty($pais)) {
    		$result = DB::table('pais')->insert($dados);	
    	}

    	if (isset($result) && $result == true) {
            return redirect()
                ->route('gerenciarPais')
                ->with(
                    'success',
                    'Pais Inserido Sucesso!'
            );            
        }else {
            return redirect()
                ->route('gerenciarPais')
                ->with(
                    'error',
                    'O Pais não foi Inserido, ou já Existe!'
            );            
        }
    }
}
