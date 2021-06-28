<?php


use Illuminate\Routing\Controller as BaseController;

class LoginController extends BaseController
{
   
    public function Login(){

        //se la sessione è attiva home
        if(session('user_id') != null){
            return redirect('home');
        }else{

            $old_username = Request::old('username');

            return view('login')
                ->with('csrf_token', csrf_token())
                ->with('old_username', $old_username);

        }
    }

    public function CheckLogin(){

        $user = Cliente::where('username', request('username'))->where('pass', request('password'))->first();
        if(isset($user)){
            Session::put('user_id', $user->cod_cliente);
            return redirect('home');
        }else{

            return redirect('login')->withInput();
                           
        }
    }

    public function logout(){
        //eleiminiamo i dati di sessione
       Session::flush();
       //torno al loghin
       return redirect('login');
   }

}
