//Validazione



function Validazione(event){
    //leggo i campi
    const username = document.querySelector('#username');
    const password = document.querySelector('#password');
    const nome = document.querySelector('#nome');
    const cognome = document.querySelector('#cognome');
    const email = document.querySelector('#email');
    const data = document.querySelector('#data');
    const checkpassword = document.querySelector('#checkpass');

    let campi_ok = true;
    if(username.value.length == 0) campi_ok = false;  
    if(password.value.length == 0) campi_ok = false;  
    if(nome.value.length == 0) campi_ok = false;  
    if(cognome.value.length == 0) campi_ok = false; 
    if(email.value.length == 0) campi_ok = false;  
    if(data.value.length == 0) campi_ok = false;
    if(checkpassword.value.length == 0) campi_ok = false;  

    const missing = document.querySelector('#missingFormErr');
    const passErr = document.querySelector('#passwordErr');
    const passLenErr = document.querySelector('#passwordLengthErr');
    
    if(!campi_ok){
        //non effettuiamo il submit
        
        event.preventDefault();
        
        missing.classList.add('errore');
        missing.classList.remove('hidden');
    }else{


        //controllo password and checkpassword
        if(checkpassword.value !== password.value){
            console.log('checkpass')
            event.preventDefault();        
            passErr.classList.add('errore');
            passErr.classList.remove('hidden');
        }else{
            
            passErr.classList.remove('errore');
            passErr.classList.add('hidden');
        }

        //controllo lunghezza password
        if(password.value.length < 8){
            console.log('checkpassLen')
            event.preventDefault();        
            passLenErr.classList.add('errore');
            passLenErr.classList.remove('hidden');
        }else{
            passLenErr.classList.remove('errore');
            passLenErr.classList.add('hidden');
        }

    }
}

const form = document.querySelector('form');
form.addEventListener('submit', Validazione);


function ControllaCampo(event){
    //verifica campo vuoto

  
    const eve = event.currentTarget;
    if(eve.value.length == 0){
        eve.classList.add('vuoto');
    }else{
        eve.classList.remove('vuoto');
    }
}

const inputs = document.querySelectorAll('input[type=text], input[type=password]');

for(input of inputs){
    //evento blur si attiva quando deselezioniamo i campi del form
    input.addEventListener('blur', ControllaCampo); 
}