<?php


use Illuminate\Routing\Controller as BaseController;

class SessionController extends BaseController
{


    public function Session(){

        if(session('user_id') == null){       
            return 0;           
        }else{        
            return session('user_id');
        }
    }


}