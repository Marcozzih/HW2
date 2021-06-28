<?php


use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{


    public function Home(){

        if(session('user_id') != null){
            //leggiamo l'utente connesso
            $user = Cliente::find(session('user_id')); 
        
            return view('home')
                ->with('nome', $user->nome);
            
        }else{        
            return redirect('registrazione');
        }
    }

    public function ReturnHome(){
        $user = Cliente::find(session('user_id')); 
        return view('home')
        ->with('nome', $user->nome);
    }


    public function ChiSiamo(){

        $user = Cliente::find(session('user_id')); 
        return view('chiSiamo');
        

    }


}
