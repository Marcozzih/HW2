<html>
    <body>
        
    
    @foreach ($prodotti as $album )
        <div> {{ $album->CB }}   </div>
        <div> {{ $album->titolo }}   </div>
        <div> {{ $album->formato }}   </div>
        
    @endforeach


    </body>


</html>