<?php

use Illuminate\Routing\Controller as BaseController;

class CollaboratoriController extends BaseController
{
    

    public function FetchImpiegati(){


        //$query = Impiegato::nome()->cognome()->get(); ????????
        $query = Impiegato::all();
        return $query;
    }


    public function OpInfo(){


        DB::statement("call op2()");
        $query = DB::table("t2")->get();

        return $query;

    }



}
