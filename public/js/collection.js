class Collection {
  constructor(){
    this.films = [];
  }

  addToCollection(filmNode){
    let film = {
      'id': filmNode['attributes']['film-id']['value'],
      'title': filmNode['attributes']['film-title']['value'],
      'avatar': filmNode['attributes']['film-avatar']['value'],
      'length': filmNode['attributes']['film-length']['value'],
      'year': filmNode['attributes']['film-year']['value'],
    };
    this.films.push(film['id']);
    
    document.getElementById("add-film-search-results").innerHTML = '';
    document.getElementById("add-film-search-results").style.border = "0px";

    if(document.getElementById("empty-collection-message")){
      document.getElementById("empty-collection-message").outerHTML = '';
    }

    let filmStack = `<a href="${BASE_URL}/films/view/${film['id']}">
    <div class="d-flex horizontal-between film-stack-content pb-2 pt-2" id="collection-film-${film['id']}">
    <div class="d-flex">
        <img src="${film['avatar']}" width="100" height="100">
        <div class="ml-2 my-auto">${film['title']} - ${film['length']}'</div>
    </div>
    <div class="my-auto">
        <button class="delete-button" onclick="collection.removeFilm(${film['id']})">&#xd7</button>
    </div>
    </div>
    </a>`;

    document.getElementById('add-film-search-input').value = '';
    document.getElementById("collection-added-films").innerHTML += filmStack;
  }

  create(){
    event.preventDefault();
    event.stopPropagation();
    let collectionName = document.getElementById("collection-name").value;
    let collectionDescription = document.getElementById("collection-description").value;
    
    httpClient.post(`${BASE_URL}/collections/add`, {
      name : collectionName,
      description : collectionDescription,
      films : JSON.stringify(collection.films)
    }, (res) => {
      if (res.readyState == 4) {
        if (res.status == 200){
          window.location.href = `${BASE_URL}/collections/index`;
        } else {
          alert('Error to add collection');
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
}

const collection = new Collection();