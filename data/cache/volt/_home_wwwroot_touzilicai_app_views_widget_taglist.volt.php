
  <div class="tl-tag-list list-group">
  	<ul class="list-unstyled">
  	<?php foreach ($taglist['items'] as $item) { ?>
    <li>
      <a href="/tag/<?php echo $item['id']; ?>.html"><?php echo $item['name']; ?></a>
    </li>
    <?php } ?>
    </ul>
    <?php echo $taglist['pager']; ?>
  </div>
