  <div class="list-group">
  	<?php foreach ($items[0]['data'] as $value) { ?>
    <div class="list-group-item">
      <a href="<?php echo $value['link']; ?>"><h4 class="list-group-item-heading"><?php echo $value['TreeData']['title']; ?></h4></a>
    </div>
    <?php } ?>
  </div>
