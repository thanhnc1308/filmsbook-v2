<div class="content bg-body pt-4 collection-body">
  <div class="container">
    <form action="/">
      <div class="w-100 d-flex">
        <div class="w-25 font-size-large">Name: </div>
        <div class="w-75">
          <input type="text" name="name" title="Collection name" class="w-50 collection-input rounded bg-dark border text-light pl-2" id="collection-name">
        </div>
      </div>
      <div class="w-100 d-flex mt-4">
        <div class="w-25 font-size-large">Descriptipn: </div>
        <div class="w-75">
          <textarea name="description" title="Collection description" id="collection-description" placeholder="description about the collection" class="w-50 pt-1 pl-1 rounded bg-dark text-light" rows="7"></textarea>
        </div>
      </div>
      <div class="w-100 d-flex mt-5">
        <div class="w-25 my-auto font-size-large">
          Add a film
        </div>
        <div class="w-75">
          <input name="film-name" title="Seach films" class="add-film-search-input collection-input rounded border bg-dark text-light pl-2" type="text" onkeyup="liveSearch.addFilmSearch(this.value)" placeholder="Search">
          <div class="add-film-search-results"></div>
        </div>
      </div>
      <div class="added-list mt-4">
        <div 
            class="ml-4 pt-2 pb-2 mr-4 collection-added-films"
        >
          <div class="empty-collection-message w-100 text-center fw-bold">Your list is empty</div>
        </div>
      </div>
      <div class="text-center mt-4">
        <button onclick="collection.create()" class="bg-success rounded border font-size-large pl-4 pr-4 pt-2 pb-2">Submit</button>
      </div>
    </form>
  </div>
</div>