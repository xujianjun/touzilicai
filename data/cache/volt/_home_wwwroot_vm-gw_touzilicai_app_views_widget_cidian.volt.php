<div class="cidian" id="tagscloud">
  <?php foreach ($cidian as $key => $value) { ?>
  <a href="/tag/<?php echo $value['id']; ?>.html" class="tagbg<?php echo $value['randBg']; ?>"><?php echo $value['name']; ?></a>
  <?php } ?>
</div>
