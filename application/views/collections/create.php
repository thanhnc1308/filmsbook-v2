<div class="content bg-body pt-4 collection-body">
  <div class="container">
    <form action="/">
      <div class="w-100 d-flex">
        <div class="w-25">Name: </div>
        <div class="w-75">
          <input type="text" name="name" class="w-50">
        </div>
      </div>
      <div class="w-100 d-flex mt-4">
        <div class="w-25">Descriptipn: </div>
        <div class="w-75">
          <textarea name="description" placeholder="description about the collection" class="w-50 pt-1 pl-1" rows="7"></textarea>
        </div>
      </div>
      <div class="w-100 d-flex mt-5">
        <div class="w-25 my-auto">
          Add a film
        </div>
        <div class="w-75">
          <input name="film-name" type="text" onkeyup="liveSearch.addFilmSearch(this.value)" placeholder="Search">
          <div id="add-film-search-results"></div>
        </div>
      </div>
      <div class="added-list mt-4">
        <div 
            class="ml-4 pt-2 pb-2 mr-4" 
            id="collection-added-films"
        >
          <div id="empty-collection-message" class="w-100 text-center fw-bold">Your list is empty</div>
        </div>
      </div>
      <div class="text-center">
        <button>Submit</button>
      </div>
    </form>
  </div>
</div>