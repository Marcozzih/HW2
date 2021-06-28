<?php


use Illuminate\Routing\Controller as BaseController;

class SigninController extends BaseController
{
   
    public function Signin(){
          //se la sessione è attiva home
          if(session('user_id') != null){
            return redirect('home');
        }else{


            //non solo l'user ma anche il resto dei campi tranne password
            $old_nome = Request::old('nome');
            $old_cognome = Request::old('cognome');
            $old_data = Request::old('data');
            $old_username = Request::old('username');
            $old_values = array('old_nome' => $old_nome, 'old_cognome' => $old_cognome, 'old_data' => $old_data, 'old_username' => $old_username);
            $error_used = Request::old('used');

            return view('registrazione')
                ->with('csrf_token', csrf_token())
                ->with('old_values', $old_values)
                ->with('error_used', $error_used);

        }
    }

    public function CheckSignin(){

        //controllo se username e email sono già in uso nel DB
        //quidni check di username e password
        //se esistono allora chiamo l if e redirect a registrazione e faccio scrivere username o password già esistenti
        //se non esistono allora creo la nuova riga Cliente nel DB
        $user = Cliente::where('username', request('username'))->where('pass', request('password'))->first();
        
        if(isset($user)){
            return redirect('registrazione')
                ->withInput()
                ->with('used', true);

            
        }else{
            $num_clienti = Cliente::all()->count();
            
            
            $user = new Cliente;
            $user->cod_cliente = $num_clienti + 1;
            $user->nome = request('nome');
            $user->cognome = request('cognome');
            $user->data_nascita = request('data');
            $user->email = request('email');
            $user->username = request('username');
            $user->pass = request('password');
            
            $user->save();




            $create_session = Cliente::where('username', request('username'))->where('pass', request('password'))->first();
            Session::put('user_id', $create_session->cod_cliente);
            
            return redirect('home');
        }
        
    }



}