<?php

use Illuminate\Database\Eloquent\Model;

class Album extends Model{

    protected $table = "album";

    protected $autoIncrement = false;
    public $timestamps = false;
    protected $primaryKey = "CB";
    protected $keyType = 'string';


    public function formatoC(){
        return $this->belongsToMany('Formato', 'carrello', 'cliente', 'album', 'formato');
    }

    public function cliente(){
        return $this->belongsToMany('Cliente', 'carrello', 'cliente', 'album', 'formato');
    }

    public function formatoE(){
        return $this->belongsToMany('Formato', 'esistein', 'album', 'formato');
    }
    
}

 
?>