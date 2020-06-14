<div class="content bg-body pt-4 collection-body">
  <div class="container">
    <div class="d-flex horizontal-between content-header">
      <div class="my-auto">
        <span class="font-size-title"><?php echo $collection['Collection']['name'] ?></span>
        <?php 
        if($collection['current_user_id'] == $collection['Owner']['id']){
          echo '<a href="' . BASE_PATH . "/collections/update/{$collection['Collection']['id']}\">";
          echo '<span class="font-size-large edit-button" title="Edit collection">
          <i class="fa fa-edit"></i>
          </span>
          </a>';
        }
        ?>
        
      </div>
      <div class="mb-2 d-flex">
        <span class="fw-bold font-size-large owner-name-top pr-3"><?php echo $collection['Owner']['name'] ?></span>
        <?php
        $html->includeImage('avatar.png', 50, 50, "border-circle");
        ?>
      </div>
    </div>

    <p><?php echo $collection['Collection']['description'] ?></p>
    <ul class="d-flex flex-wrap justify-content-start p-0">
      <?php foreach ($collection['Film'] as $films) : ?>
        <li class="collection-film-item mt-2 mr-4" title="<?php echo $films['Film']['title'] ?>">
          <?php echo '<a href="' . BASE_PATH . "/films/view/{$films['Film']['id']}\" class=\"text-light\">" ?>
          <div class="w-100">
            <img src=<?php echo $films['Film']['avatar'] ?> class="w-100 h-85 img-border">
            <p class="truncate-text"><?php echo $films['Film']['title'] ?></p>
          </div>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>