
  <div class="tl-tag-list-header">
  	<?php foreach ($taglist_header as $value) { ?>
    <a href="/tag/<?php echo $value; ?>/" <?php if ($value == $params['tagPrefix']) { ?>class="active"<?php } ?>><?php echo $value; ?></a>
    <?php } ?>
  </div>
