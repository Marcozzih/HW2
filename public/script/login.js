//Validazione



function Validazione(event){
    //leggo i campi
    const username = document.querySelector('#username');
    const password = document.querySelector('#password');

    let campi_ok = true;
    if(username.value.length == 0){

        campi_ok = false;
        

    }
    if(password.value.length == 0){

        campi_ok = false;
        

    }
    if(!campi_ok){
        //non effettuiamo il submit
        event.preventDefault();
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