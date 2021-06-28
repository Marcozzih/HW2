<html>

    <head>
        <title>Login</title>
        <link rel = 'stylesheet' href = '{{ url("style/login.css")}}'>
        <script src = '{{url("script/login.js")}}' defer></script>
    </head>
    <body>

        <header>

            <div id = 'titolo'>
                <strong>Discovolante</strong> 
            </div>            
        </header>

        <section id = 'main'>
            <h1>Login</h1>
            @if(isset($old_username))
            <div class = 'errore'>dati errati</div>
            @endif

        

            <form method = 'post'>
            
                <input type = 'hidden' name = '_token' value = '{{ $csrf_token }}'>
                <div>
                    <label>Username <br/><input type = 'text' name = 'username' id = 'username' value = '{{ $old_username }}'>  </label>
                </div>
                <div>
                    <label>Password <br/><input type = 'password' name = 'password' id = 'password'> </label>
                </div>
                <div>
                    <label><input type = 'submit'></label>
                </div>        
            </form>

            <div id = 'reg'>
                non sei rgistrato? <br/> registrati  <a href = '{{ url("registrazione") }}'> qui </a> 
            </div>

        </section>
    </body>
</html>