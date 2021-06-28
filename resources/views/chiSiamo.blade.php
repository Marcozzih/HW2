<html>

    <head>
        <title>Chi Saimo</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <link rel="stylesheet" href = '{{ url("style/info_negozio.css")}}'>
        <script src = '{{url("script/info_negozio.js")}}' defer></script>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
     
  
    </head>

    <body>
        <header>
            <nav>
                <div id = 'titolo'>
                    <strong> Discovolante </strong>
                </div>
                
                <div id = 'link'>
                    <span class = 'arrow'></span>          
                </div> 
            </nav>


            <div id = 'options' class = hidden>
                <a href = '{{ url("home") }}'>Torna alla Home</a>
            </div>

        </header>


        <section id = 'main'>

            <div id = sez1>

                <h1>I nostri collaboratori</h1>

                <div id = 'collab'>
                </diV>
            </div>


            <div id = 'finestra' class = 'hidden'>

                <div id = 'exit'>
                    <span class = 'x'></span>
                </div>

                <div id = 'info'></div>

            </div>
            

        </section>      
 

    </body>
</html>