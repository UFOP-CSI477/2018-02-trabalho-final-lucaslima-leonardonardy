<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Illuminate\Support\Facades\DB;
use Auth;

class ControleUsuario extends Controller
{
    /**
     * Recupera a senha a partir de um email e uma palavra-chave
     * 
     * @return \Illuminate\Http\Response
     */
    public function recuperarSenha(Request $request)
    {
    	$dados = $request->except('_token');

        $validator =  Validator::make($dados, [
            'email' => 'required|string|email|max:255',
            'secret' => 'required|string|min:2',
        ]);

        if($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
            ->withErrors($validator);
        }

        $resultUser = current(DB::table('users')
                        		->where('email', $dados['email'])
                        		->where('secret', $dados['secret'])
                        		->get()->toArray());
 
        if ($resultUser != false && count($resultUser) > 0) {
        	$senha = $this->gerarSenha(15, true, true, true, true);
        	$resultUserUpdate = DB::table('users')
            		->where('id', $resultUser->id)
            		->update(['password' => bcrypt($senha)]);
           	if ($resultUserUpdate == 1) {
				return redirect()
				    ->back()
				    ->with("status", "Senha foi alterada com sucesso: " . $senha);
           	} else {
				return redirect()
				    ->back()
				    ->with("erro", "Erro ao alterar senha.");	
           	}
        }
		
		return redirect()
			->back()
			->with("erro", "Usuário não encontrado.");
    }

    /**
     * Gera uma senha aleatorioa
     * 
     * @param $tamanho
     * @param $maiusculas
     * @param $minusculas
     * @param $numeros
     * @param $simbolos
     */
 	public function gerarSenha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos) {
		$ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
		$mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
		$nu = "0123456789"; // $nu contem os números
		$si = "!@#$%¨&*()_+="; // $si contem os símbolos
		$senha = "";
	  	
	  	if ($maiusculas){
	        // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
	        $senha .= str_shuffle($ma);
	  	}
	 
	    if ($minusculas){
	        // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
	        $senha .= str_shuffle($mi);
	    }
	 
	    if ($numeros){
	        // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
	        $senha .= str_shuffle($nu);
	    }
	 
	    if ($simbolos){
	        // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
	        $senha .= str_shuffle($si);
	    }
	 
	    // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
	    return substr(str_shuffle($senha),0,$tamanho);
	}

    /**
     * Chama a view de alterar dados do usuario
     * 
     * @return \Illuminate\Http\Response
     */
    public function usuarioAlterar($id)
    {
        $dados = [
            "id" => Auth::user()->id,
            "name" => Auth::user()->name,
            "email" => Auth::user()->email,
            "secret" => Auth::user()->secret
        ];

        return view("alterar-usuario", $dados);
    }


    /**
     * Validad os dados e insere no banco
     * 
     * @return \Illuminate\Http\Response
     */
    public function usuarioAlterarValidar(Request $request)
    {
        $dados = $request->except('_token');

        $validator = Validator::make($dados, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'secret' => 'required|string|min:2',
        ]);

        if (is_null($dados['password'])) {
            unset($dados['password']);
            unset($dados['password_confirmation']);
        }else {
            $dados['password'] = bcrypt($dados['password']);
            unset($dados['password_confirmation']);
        }

        $id = $dados['id'];
        unset($dados['id']);
        $resultUser = User::where('id', '=', $id)->update($dados);

        if ($resultUser == 1) {
            return redirect()
                ->back()
                ->with("status", "Usuário alterado com sucesso !!!");
        }

        return redirect()
            ->back()
            ->with("erro", "Usuário não alterado.");
    }
}
