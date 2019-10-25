<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\usuario;

class LoginController extends Controller
{
    public function login(Request $request)
    {
   

        $email = $request->email;
        $senha = $request->senha;

        $usuario = usuario::where('email', $email)->where('senha', $senha)->first();

        if ($usuario == null)
        {
            return response()->json(["mensagem" => "Usuário não encontrado"], 404);
        }
        else
        {
            $token = auth()->login($usuario);

            $user = auth()->user();            
            return response()->json(["Token do usuario" => $token, "Data"=> $user], 200);
        }
     

    }

    public function logout(Request $request)
    {
        try
        {
            auth()->logout();
            return response()->json(["mensagem" => "Usuário realizou o logout com sucesso!"], 200);
        }
        catch (Tymon\JWTAuth\Exceptions\JWTException $e)
        {
            return response()->json(["mensagem" => "Erro"], 404); 
        }

        
    }

}
