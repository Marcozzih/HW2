<html>


    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href = '{{ url("style/carrello.css")}}'>
        <script src = '{{url("script/carrello.js")}}' defer></script>


        
        <title>carrello</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">


    </head>

    <header>      
        <nav> 
        
            <div id = 'titolo'>
                <strong> Discovolante </strong>
            </div>

            <div id = 'link'>
                <h3>Benvenuto, {{ $nome }} !</h3>
                <span class = 'arrow'></span>
            </div>
        
        </nav>

        <div id = 'options' class = hidden>
            <a href = '{{ url("logout") }}'>LOGOUT</a>
        </div>
    
         
    </header>

    <section id = 'main'>
        <div id = 'mainBar'>
            <div>
                <h1>Carrello</h1>
            </div>

            <div>
                <h2>prezzo</h2>
            </div>
        </div>
      
        <div id = 'prodotto'></div>
        <div class = 'spazio'></div>
    
        <div id = 'totale'></div>
    
    </section>
</html>