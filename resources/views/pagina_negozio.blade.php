<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>pagina_negozio</title> 
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href = '{{ url("style/pagina_negozio.css")}}'>
        <script src = '{{ url("script/pagina_negozio.js")}}' defer></script>




        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    </head>

    <body>

        <header>

            <nav> 
        
                <div id = 'titolo'>
                  <strong> Discovolante </strong>
                </div>

                <div id = 'link'>
                    <a id = 'random'> RANDOM </a>
                    <a href = '{{ url("carrello") }}'> CARRELLO </a>

                    <h3>Benvenuto, {{ $nome }} !</h3>  
                </div>
             
                
            </nav>

            
        </header>

        <section>

            <div id = 'radAlbums'>
                
                

                <form id = 'input' class = 'input_view'>
                    <select name = 'filtro' id = 'filtro'>
                        <option value = 'artista'>Per Artista</option>
                        <option value = 'album'>Per Album</option>
                    </select>
                        <input type='text' id="element">
                        <input type='submit' value="Cerca">
                </form>

            </div>

            <div id = 'vetrina'>

            </div>


        </section>

        <section id = 'modal_view' class = 'hidden'>


        <div id = 'up'>
            <div id = 'img'>
            </div>

            <div id = 'prodotto'>
            

                <div id = 'album'>
                </div>

                <div id = 'artista'>
                </div>            

                <div id = 'formato'>
                    <a id = 'cd'></a>
                    <a id = 'vinile'></a>
                    <a id = 'cassetta'></a>                
                </div>

            
                <div id = 'error'>
                </div>

                <div id = 'bottone'>
                    <a id = 'carrello'>aggiungi al carrello</a>
                </div>
            </div> 

            <div id = 'exit'>
                <span class = 'x'></span>
            </div>
        </div>

        <div id = 'down'>
        </div>

        </section>
        <section id = 'inserimento_fatto' class = 'hidden'>
            <div id = 'completato'>
                <span>Prodotto inserito nel carrello correttamente</span>
            </div>

            <div id = 'continua'>
                <span>Continua a comprare</span>
            </div>

            <div id = 'home'>
                <a href = '{{ url("home") }}'>Torna alla home</span>
            </div>

        </section>

    </body>

</html>