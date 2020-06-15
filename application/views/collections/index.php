<?php
function inflect_count($count, $unit)
{
  if ($count == 0 || $count == 1) {
    return "$count $unit";
  } else {
    return "$count $unit" . "s";
  }
}
?>

<div class="content bg-body pt-4 collection-body">
  <div class="container">
    <div class="text-center">
      Collect, curate, and share. Lists are the perfect way to group films.
      <div class="pt-3">
        <?php echo "<a class=\"create-button\" href=\"" . BASE_PATH . "/collections/create\">Start your own list</a>" ?>

      </div>
    </div>
    <div class="content-header pt-4">
      Your list (<?php echo inflect_count(count($collections), 'collection'); ?>)
    </div>
    <div class="content-body d-flex flex-wrap mt-4 justify-content-start">
      <?php foreach ($collections as $collection) : ?>
        <?php echo "<a class=\"text-light\" href=\"" . BASE_PATH . "/collections/view/{$collection['Collection']['id']}\">" ?>
        <div class="collection-card">
          <div class="film-stack w-100">
            <?php for ($i = 0; $i < 5; $i++) : ?>
              <?php
              $z_index = 5 - $i;
              echo "<div class=\"stack-item z-$z_index\">";
              if (isset($collection['Film'][$i])) {
                echo "<img src=\"{$collection['Film'][$i]['avatar']}\" class=\"w-100 h-full\">";
              }
              echo "</div>";
              ?>
            <?php endfor ?>
            <div class="mt-2 mb-1 d-flex horizontal-between w-100">
              <div class="fw-bold font-size-large truncate-text">
                <?php echo $collection['Collection']['name'] ?>
              </div>
            </div>
            <div class="d-flex horizontal-between">
              <div class="d-flex">
                <?php
                $html->includeImage('avatar.png', 16, 16, 'border-circle');
                ?>
                <div class="fw-bold font-size-medium owner-name pl-1">
                  <?php echo $collection['Owner']['name'] ?>
                </div>
              </div>
              <div>
                <?php echo inflect_count(count($collection['Film']), 'film'); ?>
              </div>
            </div>
          </div>
        </div>
        </a>
      <?php endforeach ?>
    </div>

    <div class="content-header pt-4">
      Recommend list (<?php echo inflect_count(count($random_collections), 'collection'); ?>)
    </div>
    <div class="content-body d-flex flex-wrap mt-4 justify-content-start">
      <?php foreach ($random_collections as $collection) : ?>
        <?php echo "<a class=\"text-light\" href=\"" . BASE_PATH . "/collections/view/{$collection['Collection']['id']}\">" ?>
        <div class="collection-card">
          <div class="film-stack w-100">
            <?php for ($i = 0; $i < 5; $i++) : ?>
              <?php
              $z_index = 5 - $i;
              echo "<div class=\"stack-item z-$z_index\">";
              if (isset($collection['Film'][$i])) {
                echo "<img src=\"{$collection['Film'][$i]['avatar']}\" class=\"w-100 h-full\">";
              }
              echo "</div>";
              ?>
            <?php endfor ?>
            <div class="mt-2 mb-1 d-flex horizontal-between w-100">
              <div class="fw-bold font-size-large truncate-text">
                <?php echo $collection['Collection']['name'] ?>
              </div>
            </div>
            <div class="d-flex horizontal-between">
              <div class="d-flex">
                <?php
                $html->includeImage('avatar.png', 16, 16, 'border-circle');
                ?>
                <div class="fw-bold font-size-medium owner-name pl-1">
                  <?php echo $collection['Owner']['name'] ?>
                </div>
              </div>
              <div>
                <?php echo inflect_count(count($collection['Film']), 'film'); ?>
              </div>
            </div>
          </div>
        </div>
        </a>
      <?php endforeach ?>
    </div>
  </div>
</div>