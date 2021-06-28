<?php


use Illuminate\Routing\Controller as BaseController;

class PagNegozioController extends BaseController
{
    public function PagNegozio(){
        $user = Cliente::find(session('user_id'));

        return view('pagina_negozio')
            ->with('nome', $user->nome);
    }

   
}
