<?php

use Illuminate\Database\Eloquent\Model;

class Formato extends Model{

    protected $table = "formato";
    protected $autoIncrement = false;
    protected $primaryKey = "tipo";
    protected $keyType = 'string';
    public $timestamps = false;


    public function albumC(){
        return $this->belongsToMany('ALbum', 'carrello', 'cliente', 'album', 'formato');
    }

    public function cliente(){
        return $this->belongsToMany('Cliente', 'carrello', 'cliente', 'album', 'formato');
    }

    public function albumE(){
        return $this->belongsToMany('ALbum', 'esistein', 'album', 'formato');
    }

}

 
?>
