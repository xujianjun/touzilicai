<div id="carousel-generic" class="carousel <?php echo $blockName; ?>-slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  	<?php foreach ($items as $key => $value) { ?>
    <div class="item <?php if ($key == 0) { ?>active<?php } ?>">
      <a href="<?php echo $value['link']; ?>"><img src="<?php echo $value['img_path']; ?>" alt="<?php echo $value['alt']; ?>"></a>
      <div class="carousel-caption"><?php echo $value['title']; ?></div>
    </div>
    <?php } ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>