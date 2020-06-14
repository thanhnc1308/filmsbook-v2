<div class="content bg-body pt-4 collection-body">
  <div class="container">
    <form>
      <div class="w-100 d-flex">
        <div class="w-25">Name: </div>
        <div class="w-75">
          <input type="text" name="name" id="collection-new-name" class="w-50" value="<?php echo $collection['Collection']['name'] ?>">
        </div>
      </div>
      <div class="w-100 d-flex mt-4">
        <div class="w-25">Description: </div>
        <div class="w-75">
          <textarea name="description" id="collection-new-description" value="<?php echo $collection['Collection']['description'] ?>" class="w-50 pt-1 pl-1" rows="7"></textarea>
        </div>
      </div>
      <div class="w-100 d-flex mt-5">
        <div class="w-25 my-auto">
          Add a film
        </div>
        <div class="w-75">
          <input name="film-name" class="add-film-search-input" type="text" onkeyup="liveSearch.updateFilmSearch(this.value)" placeholder="Search">
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
              echo "<a href=\"http://localhost/filmsbook-v2/films/view/{$film['Film']['id']}\" class=\"film-update\" film-id=\"{$film['Film']['id']}\">
              <div class=\"d-flex horizontal-between film-stack-content pb-2 pt-2\" id=\"collection-film-{$film['Film']['id']}\">
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
      <div class="text-center">
        <?php echo "<button onclick=\"collection.update({$collection['Collection']['id']})\">Submit</button>" ?>
      </div>
    </form>
  </div>
</div>