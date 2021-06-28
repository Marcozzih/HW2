<?php

use Illuminate\Database\Eloquent\Model;

class Impiegato extends Model{
    protected $table = "impiegato";
    protected $autoIncrement = false;
    protected $primaryKey = "id_impiegato";

    public $timestamps = false;

}

 
?>
