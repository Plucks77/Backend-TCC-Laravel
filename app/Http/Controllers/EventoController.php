<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\evento;

class EventoController extends Controller
{
    public function evento(Request $request)
    {
        try {
            $user = auth()->userOrFail();
            $user_id = $user->id;
            $evento = evento::where("id_criador" , $user_id)->get();
            return response()->json(["Data" => $evento], 200);

        } 
        catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(["mensagem" => "Usuário não autenticado"], 401,);
        }        

    }
}
