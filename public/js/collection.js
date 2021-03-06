class Collection {
  constructor(){
    this.films = [];
  }

  convertNodeToFilm(filmNode){
    return {
      'id': filmNode['attributes']['film-id']['value'],
      'title': filmNode['attributes']['film-title']['value'],
      'avatar': filmNode['attributes']['film-avatar']['value'],
      'length': filmNode['attributes']['film-length']['value'],
    };
  }

  addFilmFromSearch(filmNode){
    if(collection.films.length == 0){
      collection.films = collection.loadFilmsFromUpdatePage();
    }
    let film = collection.convertNodeToFilm(filmNode);
    collection.addToCollection(film);
  }

  addToCollection(film){
    if(collection.films.indexOf(film['id']) == -1){
      collection.films.push(film['id']);

      let filmStack = `<a href="${BASE_URL}/films/view/${film['id']}" class="film-update" film-id="${film['id']}" id="collection-film-${film['id']}">
      <div class="d-flex horizontal-between film-stack-content pb-2 pt-2">
      <div class="d-flex">
          <img src="${film['avatar']}" width="100" height="100">
          <div class="ml-2 my-auto">${film['title']} - ${film['length']}'</div>
      </div>
      <div class="my-auto">
          <button class="delete-button" onclick="collection.removeFilm(${film['id']})">&#xd7</button>
      </div>
      </div>
      </a>`;

      document.getElementsByClassName("collection-added-films")[0].innerHTML += filmStack;
    }
    
    document.getElementsByClassName("add-film-search-results")[0].innerHTML = '';
    document.getElementsByClassName("add-film-search-results")[0].style.border = "0px";
    document.getElementsByClassName('add-film-search-input')[0].value = '';

    if(document.getElementsByClassName("empty-collection-message")[0]){
      document.getElementsByClassName("empty-collection-message")[0].outerHTML = '';
    }
  }

  create(){
    event.preventDefault();
    event.stopPropagation();
    let collectionName = document.getElementById("collection-name").value;
    let collectionDescription = document.getElementById("collection-description").value;
    let films = collection.loadFilmsFromUpdatePage();
    
    httpClient.post(`${BASE_URL}/collections/add`, {
      name : collectionName,
      description : collectionDescription,
      films : JSON.stringify(films)
    }, (res) => {
      if (res.readyState == 4 && res.status == 200) {
        if (res.responseText){
          toast.show(res.responseText, 'toast-error');
        } else {
          toast.show('Collection created', 'toast-success');
          window.location.href = `${BASE_URL}/collections/index`;
        }
      }
    });
  }

  loadFilmsFromUpdatePage(){
    let filmDivs = document.getElementsByClassName('film-update');
    let films = [];
    for(let i = 0; i < filmDivs.length; i++){
      films.push(filmDivs[i]['attributes']['film-id']['value']);
    }
    return films;
  }

  update(collectionId){
    event.preventDefault();
    event.stopPropagation();
    let collectionName = document.getElementById("collection-new-name").value;
    let collectionDescription = document.getElementById("collection-new-description").value;
    let films = collection.loadFilmsFromUpdatePage();

    if(!collectionName){
      toast.show('Collection name can not be empty', 'toast-error');
      return;
    }

    httpClient.post(`${BASE_URL}/collections/edit`, {
      name : collectionName,
      description : collectionDescription,
      films : JSON.stringify(films),
      collection_id: collectionId
    }, (res) => {
      if (res.readyState == 4 && res.status == 200) {
        if (res.responseText){
          toast.show(res.responseText, 'toast-error');
        } else {
          toast.show('Collection updated', 'toast-success');
          window.location.href = `${BASE_URL}/collections/view/${collectionId}`;
        }
      }
    });
  }

  removeFilm(id){
    event.preventDefault();
    event.stopPropagation();
    this.films = this.films.filter((film) => {
      film['id'] != id;
    });
    document.getElementById(`collection-film-${id}`).outerHTML = '';
  }

  confirmDelete(){
    event.preventDefault();
    event.stopPropagation();
    document.getElementById('confirm-delete-collection').classList.remove('display-none');
  }

  closeDeletePopup(){
    event.preventDefault();
    event.stopPropagation();
    document.getElementById('confirm-delete-collection').classList.add('display-none');
  }

  deleteCollection(id){
    event.preventDefault();
    event.stopPropagation();
    console.log(id);
    httpClient.post(`${BASE_URL}/collections/delete`, {
      id: id
    }, (res) => {
      if (res.readyState == 4 && res.status == 200) {
        if (res.responseText){
          toast.show(res.responseText, 'toast-error');
        } else{
          toast.show('Collection deleted', 'toast-success');
          window.location.href = `${BASE_URL}/collections/index`;
        }
      }
    });
  }
}

const collection = new Collection();