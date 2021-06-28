//apparizione delle opzioni dell'utente
const opz = document.querySelector('.arrow');
opz.addEventListener('click', MostraOpzioni);

function MostraOpzioni(event){
    const eve = event.currentTarget;
    eve.removeEventListener('click', MostraOpzioni);

    const options = document.querySelector('#options');
    options.classList.remove('hidden');
    
    eve.addEventListener('click', MenoOpzioni);
  }



function MenoOpzioni(event){
    const eve = event.currentTarget;
    eve.removeEventListener('click', MenoOpzioni);

    const options = document.querySelector('#options');
    options.classList.add('hidden');

    eve.addEventListener('click', MostraOpzioni);
}



////fetch per caricare chi lavora al negozio


fetch("fetchImpiegati").then(onResponse).then(onJson);

function onResponse(response){

    if(!response.ok) return null;
    return response.json();
}

function onJson(json){
    


    for(let i = 0; i<json.length; i++){         

        const element = document.createElement('div');
        container1.appendChild(element);

        const nome = document.createElement('span');
        nome.textContent = json[i].nome;
        element.appendChild(nome);
        
        const cognome = document.createElement('span');
        cognome.textContent = json[i].cognome;
        element.appendChild(cognome);

        //listener per la view_modale
        element.addEventListener('click', FinestraOn);
    }



}

const container1 = document.querySelector('#collab');


/**modal view script**/




function onResponseI(response){
    if(!response.ok) return null;
    return response.json();
}

function onJsonI(json){

    /* per il clic specifico sull'impiegatofar spuntare in che piano lavora */

    for(let i = 0; i<json.length; i++){

        if(json[i].nome == contents[0] && json[i].cognome == contents[1]){
            const container2 = document.querySelector('#info');
            const lavoro = document.createElement('span');
            lavoro.textContent = 'il collaboratore selezionato lavora al piano numero: '+ json[i].id_piano_corrente;
            container2.appendChild(lavoro);

            

        }

    }

    modalView.classList.remove('hidden');

}



function FinestraOn(event){
    
    const eve = event.currentTarget;   
    const el = eve.querySelectorAll('span');
    
    let i = 0;
    while(i<el.length){
        contents[i] = el[i].textContent;
        i++;
    }   

    //per evidenziare l'elemento cliccato
    eve.classList.add('highlight'); 
    elemento_scelto = eve;
    
    const elementi = document.querySelectorAll('#collab div');
    for(let aux of elementi){
        aux.removeEventListener('click', FinestraOn);
    }


    fetch('infoLavoro').then(onResponseI).then(onJsonI);

    
}

function FinestraOff(event){
    modalView.classList.add('hidden');    
    clean.innerHTML = '';

    const elementi = document.querySelectorAll('#collab div');
    for(let aux of elementi){
        aux.addEventListener('click', FinestraOn);
    }

    elemento_scelto.classList.remove('highlight');
}

const modalView = document.querySelector('#finestra');
const modal_off = document.querySelector('#finestra #exit');
const clean = document.querySelector('#finestra #info');
modal_off.addEventListener('click', FinestraOff);
const contents = [];
let elemento_scelto = '';