<html>

    <head>
        <title>Home</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href = '{{ url("style/home.css")}}'>
        <script src = '{{url("script/home.js")}}' defer></script>


        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap">
  
    </head>

    <body>
        <header>
            <div class = overlay> </div>


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
                <a href = '{{ url("carrello") }}'>CARRELLO</a>
                <a href = '{{ url("logout") }}'>LOGOUT</a>    
            </div>

            <div class = 'mainFrase'>
                <a href = '{{ url("pagina_negozio") }}'> Inizia a scoprire la musica </a>      
            </div>

        </header>


        <section id = 'main'>

            <div id = 'up'>
                <a> Musica di Tendenza </a> 
                <div class = 'overlay'></div> 
            </div>
             
            <div id = 'down'>
                
                <div class = 'search'>
                    <div id = 'ricerca'>
                        <span>cerca per nome album</span>
                        <input type='text'>
                    </div>
                </div>
        
                <div id = 'albums'>
        
                    <div class = 'prodotto'>
                        <div class = 'img'></div>         
                        <div class = 'album'></div>         
                        <div class = 'info'>
                            <div class = 'desc'></div>
                            <h2>mostra +</h2>              
                        </div>
                    </div>           
 
                    <div class = 'prodotto'>
                        <div class = 'img'></div>
                        <div class = 'album'></div>
                        <div class = 'info'>
                            <div class = 'desc'></div>
                            <h2>mostra +</h2>            
                        </div>
                    </div>

                    <div class = 'prodotto'>
                        <div class = 'img'></div>
                        <div class = 'album'></div>
                        <div class = 'info'>
                            <div class = 'desc'></div>
                            <h2>mostra +</h2>                
                        </div>
                    </div>

                    <div class = 'prodotto'>
                        <div class = 'img'></div>
                        <div class = 'album'></div>
                        <div class = 'info'>
                            <div class = 'desc'></div>
                            <h2>mostra +</h2>
                        </div>
                    </div>

                    <div class = 'prodotto'>
                        <div class = 'img'></div>
                        <div class = 'album'></div>
                        <div class = 'info'>
                            <div class = 'desc'></div>
                            <h2>mostra +</h2>
                        </div>
                    </div>

                </div>        
            </div>
 
        </section>
 
     
     
        <footer>
            <div>
                <strong> TITOLO </strong>
            </div>
            <div class = 'info'>
                <a href = '{{ url("chi_siamo") }}'> - chi siamo </a> 
            </div>
        
            <div>
                <h1>MARCO PARATORE O46002248</h1>
            </div>

        </footer>

    </body>
</html>