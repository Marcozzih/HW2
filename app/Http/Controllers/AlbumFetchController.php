<?php



use Illuminate\Routing\Controller as BaseController;

class AlbumFetchController extends BaseController
{

    public function FetchAlbums(){


        $query = Album::all();
        return $query;

    }

    public function FetchFormatiAlbum(){
        $albums = Album::all();
        $formati = DB::table('formato')
            ->join('esistein', 'formato.tipo', '=', 'esistein.formato')
            ->get();

        $prodotti = array('Albums' => $albums, 'Formati' => $formati);


        return $prodotti;
    }

    public function fetchAlbumUsers(){

        $query = DB::table('carrello')
                    ->join('cliente', 'carrello.cliente', '=', 'cliente.cod_cliente')
                    ->join('album', 'carrello.album', '=', 'album.CB')
                    ->join('esistein', function($join) {
                        $join->on('carrello.album', '=', 'esistein.album')->on('carrello.formato', '=', 'esistein.formato');
                    })->get();

        
        return $query;

    }
}
