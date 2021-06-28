


////zona random nuova

const no_repeat = [];

//creao l'evento come trigger 'Random'
const eventoTop = document.querySelector('#random');
eventoTop.addEventListener('click', radAlbum);


function radAlbum(event){
  const evento = event.currentTarget;
  evento.removeEventListener('click', radAlbum);

  const inp = document.querySelector('#input');
  inp.classList.remove('input_view');
  inp.classList.add('input_hidden');
  fetch("fetch").then(onResponseP).then(onJsonP);

}

function onResponseP(response){
  return response.json();
}

function onJsonP(json){
  //numero albums
  const numerAlbum = json.length;

  for(let i = 0; i<5; i++){

    let num = Math.floor(Math.random() * numerAlbum);
  

    if(no_repeat.length > 0){
      //ogni volta che c'è un numero uguale cambio il suo valore è ricontrollo se è tutto apposto vado avanti
      let i = 0;
      while(i<no_repeat.length){       
        if(no_repeat[i] === num){
          num = Math.floor(Math.random() * numerAlbum);
          i = 0;
        }else{
          i++;
        }
      }
      
  }
    no_repeat[i] = num;
    //immagine
    const img_album = json[num].image;
    //titolo album
    const name_album = json[num].titolo;
    //artista album
    const nome_artista = json[num].artista;

    const contenitore = document.querySelector('#radAlbums');
    const cont_top = document.createElement('div');
    contenitore.appendChild(cont_top);
    

    //img album
  const c_img_album = document.createElement('img');
  c_img_album.src = img_album;
  cont_top.appendChild(c_img_album);

  //nome album
  const c_name_album = document.createElement('h2');
  c_name_album.textContent = name_album;
  cont_top.appendChild(c_name_album);

  //nome artista
  const c_nome_artista = document.createElement('h2');
  c_nome_artista.textContent = nome_artista;
  cont_top.appendChild(c_nome_artista);
  }

  RandomForView();
}




////zona ricerca album nuova 

let valore = '';
let filtro = '';
const form = document.querySelector('form');

form.addEventListener('submit', Ricerca);


function Ricerca(event){

    event.preventDefault();     
    const elemeto = document.getElementById("filtro");
    filtro = elemeto.value;

    const conten_valore = document.querySelector('#element');
    valore = conten_valore.value;

    if(valore){
      fetch("fetch").then(onResponse).then(onJson);
    }else{
      const vetrina = document.querySelector('#vetrina');
      vetrina.innerHTML = '';
      const result = document.createElement('h1');
      result.textContent = 'inserisci qualcosa da cercare';
      vetrina.appendChild(result);
    }
    
     
            
}


function onResponse(response){
  return response.json();

}


function onJson(json) {
    const vetrina = document.querySelector('#vetrina');
    vetrina.innerHTML = '';
  
    let num = json.length;

    let i = 0;
    let album_aggiunti = 0;
    while(i<num)
    {
      if(filtro == 'artista'){

        //ricerca per artista
        const artista = json[i].artista;
        if(artista.search(valore) !== -1){
          //titolo
          const album = document.createElement('div');
          album.classList.add('album');
          //immagine                  
          const img = document.createElement('img');
          const selected_image = json[i].image;
          img.src = selected_image;

          const caption = document.createElement('h2');
          caption.textContent = json[i].titolo;
          album.appendChild(img);
          album.appendChild(caption);
          vetrina.appendChild(album);
          album_aggiunti++;
          
        }
      }




        //ricerca per album
      if(filtro == 'album'){

        const titolo = json[i].titolo;
        if(titolo.search(valore) !== -1){
          //titolo
          const album = document.createElement('div');
          album.classList.add('album');
          //immagine                  
          const img = document.createElement('img');
          const selected_image = json[i].image;
          img.src = selected_image;

          const caption = document.createElement('h2');
          caption.textContent = json[i].titolo;
          album.appendChild(img);
          album.appendChild(caption);
          vetrina.appendChild(album);
          album_aggiunti++;
          
        }
      }





        if(album_aggiunti === 6){
          i = num;
        }else{
          i++;
        }
  }

  if(album_aggiunti === 0){
    const result = document.createElement('h1');
    result.textContent = 'Nessun Album Trovato.';
    vetrina.appendChild(result);
  }
  
  RicercaView();//per la modal_view della parte ricerca
}

////modal-view

//per la sezione di ricerca

function RicercaView(){
  const view_album = document.querySelectorAll('#vetrina div');
  
  for(let aux of view_album){
    
    aux.addEventListener('click', ViewModalRicerca);
  }
}

function ViewModalRicerca(event){

  const eve = event.currentTarget;
  contents[0] = eve.querySelector('h2').textContent;
  contents[1] = valore;
  fetch("fetch_formato").then(onResponseC).then(onJsonC);


  //visualizzo la pagina
  const input = document.querySelector('#modal_view');
  input.classList.remove('hidden');
  //input per togliere la modale
  const modal_off = document.querySelector('#modal_view #exit');
  modal_off.addEventListener('click', ViewModalOff);

}

////per la sezione random
//evento che si attiva al clicco di random
function RandomForView(){
  const view_album = document.querySelectorAll('#radAlbums div');

  for(let aux of view_album){
    aux.addEventListener('click', ViewModal);
  }

}

function ViewModal(event){
  //riempio la pagina a seconda dell'album cliccato

  //recupero l'elemento cliccato
  const eve = event.currentTarget;
  const el = eve.querySelectorAll('h2');
 
  for(let i = 0; i<el.length; i++){
    contents[i] = el[i].textContent;
    
  }

  
  fetch("fetch_formato").then(onResponseC).then(onJsonC);


  //visualizzo la pagina
  const input = document.querySelector('#modal_view');
  input.classList.remove('hidden');
  input.style.top = window.pageYOffset + 'px';
  //input per togliere la modale
  const modal_off = document.querySelector('#modal_view #exit .x');
  modal_off.addEventListener('click', ViewModalOff);


}

function ViewModalOff(event){

  const input = document.querySelector('#modal_view');
  input.classList.add('hidden');

  contenitoreCD.classList.remove('offClick');
  contenitoreVinile.classList.remove('offClick');
  contenitoreCassetta.classList.remove('offClick');
  contenitoreCD.classList.remove('click');
  contenitoreVinile.classList.remove('click');
  contenitoreCassetta.classList.remove('click');
  

  contenitore_img.innerHTML = '';
  contenitore_titolo.innerHTML = '';
  contenitore_artista.innerHTML = '';
  contenitoreCD.innerHTML = '';
  contenitoreVinile.innerHTML = '';
  contenitoreCassetta.innerHTML = '';
  contenitore_desc.innerHTML = '';

  const error_select = document.querySelector('#prodotto #error');
  error_select.classList.remove('red_text');
  error_select.innerHTML ='';

  flag_scelta_formato = false;

  let num = formatoSelezionato.length;
  for(let i = 0; i<num; i++){
    formatoSelezionato.pop();
  }


}

function onResponseC(response){
  return response.json();
}

function onJsonC(json){

  const numA = json.Albums.length;
  const numF = json.Formati.length;
  for(let i=0; i<numA; i++){

    if(json.Albums[i].titolo === contents[0] && json.Albums[i].artista === contents[1]){
      
      //riempio la pagina
      //image
      const img = document.createElement('img');
      img.src = json.Albums[i].image;
      contenitore_img.appendChild(img);
      //titolo
      const title = document.createElement('h1');
      title.textContent = json.Albums[i].titolo;
      contenitore_titolo.appendChild(title);
      //artista
      const artist = document.createElement('h1');
      artist.textContent = json.Albums[i].artista;
      contenitore_artista.appendChild(artist);
      //descrizione
      const desc = document.createElement('h1');
      desc.textContent = json.Albums[i].descrizione;
      contenitore_desc.appendChild(desc);

      for(let e = 0; e<numF; e++){
 
        if(json.Albums[i].CB === json.Formati[e].album){
          
  
          //creao i tasti dei formati + prezzo
          if(json.Formati[e].formato === 'cd'){

            const cd = document.createElement('h1')
            const prezzoCD = document.createElement('h1');
            cd.textContent = json.Formati[e].formato;
            prezzoCD.textContent = json.Formati[e].prezzo  + ' €';
            contenitoreCD.appendChild(cd);
            contenitoreCD.appendChild(prezzoCD);
            contenitoreCD.classList.add('offClick');
            contenitoreCD.addEventListener('click', Scelta);
            formatoSelezionato.push('cd');
          }     
            
          
  
          if(json.Formati[e].formato === 'vinile'){

            const vinile = document.createElement('h1')
            const prezzoVinile = document.createElement('h1');
            vinile.textContent = json.Formati[e].formato;
            prezzoVinile.textContent = json.Formati[e].prezzo  + ' €';
            contenitoreVinile.appendChild(vinile);
            contenitoreVinile.appendChild(prezzoVinile);
            contenitoreVinile.classList.add('offClick');
            contenitoreVinile.addEventListener('click', Scelta);
            formatoSelezionato.push('vinile');
          }
  
          if(json.Formati[e].formato === 'cassetta'){

            const cassetta = document.createElement('h1')
            const prezzoCassetta = document.createElement('h1');
            cassetta.textContent = json.Formati[e].formato;
            prezzoCassetta.textContent = json.Formati[e].prezzo  + ' €';
            contenitoreCassetta.appendChild(cassetta);
            contenitoreCassetta.appendChild(prezzoCassetta);
            contenitoreCassetta.classList.add('offClick');
            contenitoreCassetta.addEventListener('click', Scelta);
            formatoSelezionato.push('cassetta');
          }

        }
      }



    }
  }


}




contents = [];
const contenitore_img = document.querySelector('#img');
const contenitore_titolo = document.querySelector('#prodotto #album');
const contenitore_artista = document.querySelector('#artista');
const contenitore_desc = document.querySelector('#down');

const contenitoreCD = document.querySelector('#formato #cd');
const contenitoreVinile = document.querySelector('#formato #vinile');
const contenitoreCassetta = document.querySelector('#formato #cassetta');

//per tenere conto del formato selezionato
const formatoSelezionato = [];
const formatoDaAggiungere = [1];
let flag_scelta_formato = false;



//scelta del formato
function Scelta(event){
//flag = 1 ho scelto almeno un formato;
  flag_scelta_formato = true;


  //controllo i formati che esistono
  if(formatoSelezionato.length === 3){
    formatoDaAggiungere.pop();
    //tolgo il click a tutti
    contenitoreCD.classList.remove('click');
    contenitoreVinile.classList.remove('click');
    contenitoreCassetta.classList.remove('click');
    //aggiungo il click all'evento
    const eve = event.currentTarget;
    eve.classList.add('click');
    const aux = eve.querySelectorAll('h1');
    formatoDaAggiungere.push(aux[0].textContent);
  }

  if(formatoSelezionato.length === 2){
    formatoDaAggiungere.pop();
    //tolgo il click a tutti    
    contenitoreCD.classList.remove('click');
    contenitoreVinile.classList.remove('click');
    contenitoreCassetta.classList.remove('click');
    //aggiungo il click all'evento
    const eve = event.currentTarget;
    eve.classList.add('click');
    const aux = eve.querySelectorAll('h1');
    formatoDaAggiungere.push(aux[0].textContent);
  }

  if(formatoSelezionato.length === 1){
    formatoDaAggiungere.pop();
    //tolgo il click a tutti    
    contenitoreCD.classList.remove('click');
    contenitoreVinile.classList.remove('click');
    contenitoreCassetta.classList.remove('click');
    //aggiungo il click all'evento
    const eve = event.currentTarget;
    eve.classList.add('click');
    const aux = eve.querySelectorAll('h1');
    formatoDaAggiungere.push(aux[0].textContent);
    eve.removeEventListener('click', Scelta);
  }

}

function FromScelta2(event){

  const eve = event.currentTarget;
  eve.classList.add('click');
  eve.removeEventListener('click', Scelta2);


}



//bottone aggiungi a carrello

const bottoneCarrello = document.querySelector('#bottone #carrello');
bottoneCarrello.addEventListener('click', AddCarrello);

function AddCarrello(event){

  
  if(!flag_scelta_formato){
    

    const error_select = document.querySelector('#prodotto #error');
    error_select.classList.add('red_text');
    const nessuna_selezione = document.createElement('h1');
    
    nessuna_selezione.textContent = 'Scegliere un formato da aggiungere al carrello';    
    error_select.appendChild(nessuna_selezione);
  }else{

    const contentA = document.querySelector('#album h1');
    const contentT = document.querySelector('#artista h1');
    const contentF = formatoDaAggiungere[0];
    fetch('insert_carrello/'+contentA.textContent+'/'+contentT.textContent+'/'+contentF);
 
  //aggiunta completata
  //faccio comparire la modale che mi avverte
  
    completato.classList.remove('hidden');
  
  }
}



const completato = document.querySelector('#inserimento_fatto');


////continuo a fare acquisti
const negozio = document.querySelector('#continua span');
negozio.addEventListener('click', ContinuoAcquisti);

function ContinuoAcquisti(event){
  completato.classList.add('hidden');
  ViewModalOff();  
}




////quando clicco su Discovolante torno alla home
const home = document.querySelector('#titolo strong');

home.addEventListener('click', ReturnHome);

function ReturnHome(event){
  window.open('return_home', '_self');
  event.currentTarget.removeEventListener('click', ReturnHome);
}