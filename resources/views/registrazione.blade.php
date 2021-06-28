<html>

    <head>
        <title>Registrazione</title>
        <link rel = 'stylesheet' href = '{{ url("style/registrazione.css")}}'>
        <script src = '{{url("script/registrazione.js")}}' defer></script>
    </head>
    
    <body>    
    
        <header>    
            <div id = 'titolo'>
                <strong>Discovolante</strong> 
            </div>     
        </header>
    
        <section id = 'main'>
    
            <div>
                <h1>Registrati</h1>     
            </div>

            @if($error_used)
            <div class = 'errore'>username o email già esistenti</div>
            @endif

            <div id = 'missingFormErr' class = 'hidden'>Riempire tutti i campi</div>
            <div id = 'passwordErr' class = 'hidden'>Le password sono diverse</div>
            <div id = 'passwordLengthErr' class = 'hidden'>la password deve avere almeno 8 caratteri</div>

            <form method = 'post'>
                <input type = 'hidden' name = '_token' value = '{{ $csrf_token }}'>
                <div>
                    <label>Nome<br/> <input type = 'text' name ='nome' id = 'nome' ></label>
                </div>
                <div>          
                    <label>Cognome<br/> <input type = 'text' name = 'cognome' id = 'cognome'></label>
                </div>
                <div>
                    <label>Data di nascita<br/> <input type = 'text' name = 'data' id = 'data'></label>
                </div>    
                <div>
                    <label>Email<br/> <input type = 'text' name = 'email' id = 'email'></label>
                </div>
                <div>
                    <label>Username<br/> <input type = 'text' name = 'username' id = 'username'></label>
                </div>
                <div>
                    <label>Password<br/> <input type = 'password' name = 'password' id = 'password'></label>
                </div>
                <div>
                    <label>Conferma Password<br/> <input type = 'password' name = 'conferma_password' id = 'checkpass'></label>
                </div>
                    
                <div>
                    <label><input type = 'submit'></label>
                </div>
                
            </form>
    
            <div id = 'log'>
                hai già un account <br/>> <a href = '{{ url("login") }}'> accedi </a>
            </div>
    
        </section>
    </body>