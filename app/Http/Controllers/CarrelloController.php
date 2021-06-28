<?php


use Illuminate\Routing\Controller as BaseController;

class CarrelloController extends BaseController
{
    public function Carrello(){
        $user = Cliente::find(session('user_id'));

        return view('carrello')
            ->with('nome', $user->nome);
    }

    public function RimuoviElemento($album, $artista, $formato){

        if(session('user_id') == null){
            return redirect('login');
        }else{

            $user = session('user_id');
            $albumTrovato = Album::where('titolo', $album)->where('artista', $artista)->first();
            $albumCarrello = Carrello::where('album', $albumTrovato->CB)->where('cliente', $user)->where('formato', $formato)->first();
            $albumCarrello->delete();

        }
    }

    public function Insert($album, $artista, $formato){

        if(session('user_id') == null){
            return redirect('registrazione');
        }else{

            
            //utente 
            $user = session('user_id');

            //cerco l'album nel database
            $albumTrovato = Album::where('titolo', $album)->where('artista', $artista)->first();

            //cont elementi nel DB
            $n_id = Carrello::max('id');
            //inserisco
            $prodotto = new Carrello;
            
            $prodotto->id = $n_id + 1;
            $prodotto->album = $albumTrovato->CB;
            $prodotto->cliente = $user;
            $prodotto->formato = $formato;
            
            $prodotto->save();
        }
    }

   
}

