<div class="content bg-body pt-4 collection-body">
  <div class="container">
    <div class="text-center">
      Collect, curate, and share. Lists are the perfect way to group films.
      <div class="pt-3">
        <a class="create-button">Start your own list</a>
      </div>
    </div>
    <div class="content-header pt-4">
      Your list ( x items)
    </div>
    <?php var_dump($collections) ?>
    <?php foreach ($collections as $collection) : ?>
    <div class="content-body d-flex mt-4 horizontal-between">
      <div class="collection-card">
        <div class="film-stack w-100">
        <?php for($i=0; $i < 5; $i++) : ?>
          <?php 
          $z_index = 5 - $i;
          echo "<div class=\"stack-item z-$z_index\"";
              if(isset($collection['Film'][$i])){
                echo "<img src=\"$collection['Film'][$i]['avatar']\">";
              }
          echo "</div>";
          ?>
        <?php endfor ?>
        <div class="mt-2 mb-1 d-flex horizontal-between w-100">
          <div class="fw-bold font-size-large">
            <a href="#">
              <?php echo $collection['Collection']['name'] ?>
            </a>
          </div>
          <div>20 films</div>
        </div>
        <div class="d-flex horizontal-between">
          <div>
            <a class="avatar" href="#">
              <img src="img/avatar.jpeg" width="16" height="16">
            </a>
            <span class="fw-bold font-size-medium">Tuan Anh</span>
          </div>
          <div>
            <div>&#10084; 1000 &#128172; 100</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>