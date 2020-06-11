class Collection {
  addToCollection(filmNode){
    let film = {
      'title': filmNode['attributes']['film-title']['value'],
      'avatar': filmNode['attributes']['film-avatar']['value'],
      'length': filmNode['attributes']['film-length']['value'],
      'year': filmNode['attributes']['film-year']['value'],
    };
    document.getElementById("add-film-search-results").innerHTML = '';
    document.getElementById("add-film-search-results").style.border = "0px";

    if(document.getElementById("empty-collection-message")){
      document.getElementById("empty-collection-message").outerHTML = '';
    }

    let filmStack = `<a href="#">
    <div class="d-flex horizontal-between film-stack-content pb-2 pt-2">
    <div class="d-flex justify-content-start">
        <img src="${film['avatar']}" width="100" height="100">
        <div class="ml-2 my-auto">${film['title']} (${film['year']}) - ${film['length']}'</div>
    </div>
    <div class="my-auto">
        <button class="delete-button">&#xd7</button>
    </div>
    </div>
    </a>`;
    console.log(filmStack);

    document.getElementById("collection-added-films").innerHTML += filmStack;
  }
}

const collection = new Collection();