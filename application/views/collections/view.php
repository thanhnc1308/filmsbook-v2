<div class="content bg-body pt-4 collection-body">
  <div class="container">
    <div class="d-flex justify-content-start content-header">
      <div class="mb-2">
        <a class="avatar" href="#">
          <img src="img/avatar.jpeg" width="16" height="16">
        </a>
        <span class="fw-bold font-size-medium">Tuan Anh</span>
      </div>
    </div>
    <h1><?php echo $collection['Collection']['name'] ?></h1>
    <p><?php echo $collection['Collection']['description'] ?></p>
    <ul class="d-flex flex-wrap justify-content-start p-0">
      <?php foreach ($collection['Film'] as $films) : ?>
        <li class="collection-film-item mt-2 mr-4" title="<?php echo $films['Film']['title'] ?>">
          <img src=<?php echo $films['Film']['avatar'] ?> class="w-100 h-75 img-border">
          <p class="truncate-text"><?php echo $films['Film']['title'] ?></p>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>