<div class="content bg-body pt-4 collection-body">
  <div class="container">
    <form>
      <div class="w-100 d-flex">
        <div class="w-25 font-size-large">Name: </div>
        <div class="w-50">
          <input type="text" name="name" title="Collection name" id="collection-new-name" class="w-100 collection-input rounded bg-dark border text-light pl-2" value="<?php echo $collection['Collection']['name'] ?>">
        </div>
        <div class="w-25">
          <?php echo "<div class=\"delete-collection-button\" onclick=\"collection.confirmDelete()\">" ?>
          <span class="font-size-x-large edit-button" title="Delete collection">
            <i class="fa fa-trash"></i>
          </span>
        </div>
      </div>
  </div>
  <div class="w-100 d-flex mt-4">
    <div class="w-25 font-size-large">Description: </div>
    <div class="w-50">
      <textarea name="description" title="Collection description" id="collection-new-description" value="<?php echo $collection['Collection']['description'] ?>" class="w-100 pt-1 pl-1 rounded bg-dark text-light" rows="7"></textarea>
    </div>
    <div class="delete-confirm-message bg-dark display-none" id="confirm-delete-collection">
      <span>Confirm deleting</span><br>
      <?php echo "<button onclick=\"collection.deleteCollection({$collection['Collection']['id']})\" class=\"confirm-button\">Yes</button>" ?>
      <button onclick="collection.closeDeletePopup()" class="confirm-button">No</button>
    </div>
  </div>
  <div class="w-100 d-flex mt-5">
    <div class="w-25 my-auto font-size-large">
      Add a film
    </div>
    <div class="w-75">
      <input name="film-name" title="Seach films" class="add-film-search-input collection-input rounded border bg-dark text-light pl-2" type="text" onkeyup="liveSearch.updateFilmSearch(this.value)" placeholder="Search">
      <div class="add-film-search-results"></div>
    </div>
  </div>
  <div class="added-list mt-4">
    <div class="ml-4 pt-2 pb-2 mr-4 collection-added-films">
      <?php
      if (count($collection['Film']) == 0) {
        echo '<div class="empty-collection-message" class="w-100 text-center fw-bold">Your list is empty</div>';
      } else {
        foreach ($collection['Film'] as $film) {
          echo "<a href=\"http://localhost/filmsbook-v2/films/view/{$film['Film']['id']}\" class=\"film-update\" film-id=\"{$film['Film']['id']}\" id=\"collection-film-{$film['Film']['id']}\">
              <div class=\"d-flex horizontal-between film-stack-content pb-2 pt-2\">
              <div class=\"d-flex\">
                  <img src=\"{$film['Film']['avatar']}\" width=\"100\" height=\"100\">
                  <div class=\"ml-2 my-auto\">{$film['Film']['title']} - {$film['Film']['length']}'</div>
              </div>
              <div class=\"my-auto\">
                  <button class=\"delete-button\" onclick=\"collection.removeFilm({$film['Film']['id']})\">&#xd7</button>
              </div>
              </div>
              </a>";
        }
      }
      ?>
    </div>
  </div>
  <div class="text-center mt-4">
    <?php echo "<button onclick=\"collection.update({$collection['Collection']['id']})\" class=\"bg-success rounded border font-size-large pl-4 pr-4 pt-2 pb-2\">Update</button>" ?>
  </div>
  </form>
</div>
</div>