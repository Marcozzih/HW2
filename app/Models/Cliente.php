<?php

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $table = "cliente";
    protected $autoIncrement = false;
    protected $primaryKey = "cod_cliente";
    public $timestamps = false;

   
    public function album(){
        return $this->belongsToMany('ALbum', 'carrello', 'cliente', 'album', 'formato');
    }

    public function formato(){
        return $this->belongsToMany('Formato', 'carrello', 'cliente', 'album', 'formato');
    }
}

 
?>
