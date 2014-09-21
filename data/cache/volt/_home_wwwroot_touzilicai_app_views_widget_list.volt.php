
  <div class="tl-list list-group">
  	<h1><?php echo $title; ?></h1>
  	<?php foreach ($items as $item) { ?>
    <div class="list-group-item">
      <div class="list-dtime"></div>
      <a href="<?php echo $item['link']; ?>"><h4 class="list-group-item-heading"><?php echo $item['TreeData']['title']; ?></h4></a>
      <p class="list-group-item-text"><?php echo $item['TreeData']['summary']; ?></p>
    </div>
    <?php } ?>
    <div class="list-pager"><?php echo $pager; ?></div>
  </div>
