let Lista=[];


function onJsonUnlikes(json){
  //console.log(json);
    console.log("Json Unlike: " + json);
}

function onJsonlikes(json){
//console.log(json);
  console.log("Json Like: " + json);

}

function select(event){
    const container = event.currentTarget;    //definisce il div cliccato
    const id=container.querySelector("p");
    const title= container.querySelector("h1");   
    const price= container.querySelector("em");
    const img= container.querySelector(".copertina_comics");
    const unlike_button= container.querySelector(".unlikebutton");
    console.log(id.innerHTML);
    console.log(title.innerHTML);
    console.log(price.innerHTML);
    console.log(img.src);
    console.log(unlike_button.src);
    let form_data= new FormData();
    form_data.append('id', id.innerHTML);
    form_data.append('title', title.innerHTML);
    form_data.append('price', price.innerHTML);
    form_data.append('image', img.src);
    form_data.append('_token', CSFR_TOKEN);
      //controllo l'icona del like
    if(unlike_button.src==="http://127.0.0.1:8000/images/unlike_button.png"){
    unlike_button.src="../images/like_button.png";
    fetch(ADD_LIKES_ROUTE, {
      method: 'post',
      body: form_data
    }).then(onResponse).then(onJsonlikes);
 }else{
  
    //devo togliere 
    unlike_button.src="../images/unlike_button.png";
    fetch(REMOVE_LIKES_ROUTE,{
      method:'post',
      body: form_data
    }).then(onResponse).then(onJsonUnlikes);
  }
}


function onJsonCheck_likes_or_unlikes(json){
  console.log(json); //stampa true o false in base se c'è mi piace già da prima o no
  //console.log("Json: "+ json.like);
  if(json.like){
    const button_like=Lista[json.indice].querySelector('.unlikebutton');
    button_like.src="../images/like_button.png";
  }
  
}


function onJson(json){
    console.log(json);
    
    const vetrina=document.querySelector('#comics_view');
    const vetrina_errore=document.querySelector('#comics_view_error');
    const loading=document.querySelector('.loading');
    loading.innerHTML='';
    vetrina.innerHTML='';
    vetrina_errore.innerHTML='';
     // Leggi il numero di risultati
   const results = json.data.count;
   console.log("Numero di risultati:" + results);
  
 
   if(results == 0)
   {
     const div_vetrina_errore=document.createElement('div');
     div_vetrina_errore.classList.add('errorstyle');
     const errore = document.createElement("h1"); 
     errore.textContent="Nessun risultato trovato!";
     const gif_iron=document.createElement('img');
     gif_iron.src="../images/iron-man_cry.gif";
     div_vetrina_errore.appendChild(errore);
     div_vetrina_errore.appendChild(gif_iron);
     vetrina_errore.appendChild(div_vetrina_errore);
   }
 
  
   const comic= json.data.results;
   for(let i=0; i<results; i++){  
       const comic_img=comic[i].thumbnail.path+"/standard_fantastic.jpg"; //attenzione, mettere .jpg se no avremo errore 403
       
       const comic_title=comic[i].title;
       const comic_price=comic[i].prices[0].price;
       const comic_id=comic[i].id;
       const div_vetrina=document.createElement('div');
       div_vetrina.classList.add('comicsstyle');
       const id=document.createElement('p');
       id.textContent="id: "+ comic_id;
       const title=document.createElement('h1');
       title.textContent="Title: "+comic_title;
      const price=document.createElement('em');
      price.textContent="Price: "+comic_price; 
      const unlike_button=document.createElement('img');
      unlike_button.src="../images/unlike_button.png";
      div_vetrina.appendChild(id);
      div_vetrina.appendChild(title);
       div_vetrina.appendChild(price); 
       const img=document.createElement('img');
       if(comic_img=="http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available/standard_fantastic.jpg"){
        
        img.src="../images/copertina_non_disponibile.jpg";
        img.classList.add('copertina_comics');
        div_vetrina.appendChild(img);
      }else{ 
      
      img.src=comic_img; 
      
      div_vetrina.appendChild(img);
      img.classList.add('copertina_comics');
      
     }
     
     div_vetrina.appendChild(unlike_button);
     unlike_button.classList.add('unlikebutton');
    
       //aggiungiamo il div
       vetrina.appendChild(div_vetrina);
       
   }

   Lista= document.querySelectorAll("#comics_view div"); //metto i div in una lista
   console.log(Lista);
   //console.log(Lista[1].childNodes[1]);
   
   for (const box of Lista) {        ////per aggiungere l'eventlistener a tutti i div stampati
     box.addEventListener('click',select);  
     
   }
   for(let i=0; i<Lista.length; i++){ //per aggiungere il cuore rosso se quel post ha gia' ricevuto like in precedenza
     console.log(Lista[i].querySelector("h1").innerHTML);
     const id_comic=Lista[i].querySelector("p").innerHTML;
     const formCheckLike = new FormData();
	   formCheckLike.append('id', id_comic);
     formCheckLike.append('indice', i);
     formCheckLike.append('_token', CSFR_TOKEN);
  fetch(CHECK_LIKE_OR_UNLIKE_ROUTE,{
    method:'post',
    body: formCheckLike
  }).then(onResponse).then(onJsonCheck_likes_or_unlikes);
   }
 }

 function onResponse(response){
     return response.json();
 } 
 
 //creo la funzione che richiama il file marvel_api.php per effettuare richiesta all'api
 function search(event){
     
   
      event.preventDefault();
   
     // Leggi valore del campo di testo
     const content = document.querySelector('#content').value;
     
     //verifico che non sia stato inserito uno spazio inizialmente
     if(content[0] === " "){
        const vetrina=document.querySelector('#comics_view');
        const vetrina_errore=document.querySelector('#comics_view_error');
        const loading=document.querySelector('.loading');
        loading.innerHTML='';
        vetrina.innerHTML='';
        vetrina_errore.innerHTML='';
        const div_vetrina_errore=document.createElement('div');
        div_vetrina_errore.classList.add('errorstyle');
        const errore = document.createElement("h1"); 
        errore.textContent="Togli lo spazio iniziale per effettuare una ricerca!";
        const gif_iron=document.createElement('img');
        gif_iron.src="../images/iron-man_cry.gif";
        div_vetrina_errore.appendChild(errore);
        div_vetrina_errore.appendChild(gif_iron);
        vetrina_errore.appendChild(div_vetrina_errore);
     }else if(content){ //verifico che e' stato inserito del testo 
        let text=content;
        let testo=text.replace(" ", "%20");//sostituisco gli spazi con il %20 nell'input inserito, testo sara' = a text, ma al posto degli spazi avra' %20
        console.log("Supereroe digitato: " + testo);

        //faccio spuntare la scritta "laoding"
        const div_caricamento=document.querySelector(".loading");
        const laoding_text=document.createElement("h1");
        laoding_text.textContent="Loading";
        div_caricamento.appendChild(laoding_text);
        div_caricamento.classList.add('loading');

         //eseguo la fetch
    fetch(HOME_ROUTE+"/marvel_api/"+ encodeURIComponent(testo)).then(onResponse).then(onJson);    
 }
 }
 
 const form=document.querySelector('#search_comics');
 form.addEventListener('submit', search);
 console.log(Lista);