<div id="slider-wrapper">
    <div id="slider" class="nivoSlider">
    	<?php foreach ($items as $key => $value) { ?>
        <a href="#"><img src="<?php echo $value['img_path']; ?>" alt="" title="#htmlcaption<?php echo $key + 1; ?>" /></a>
        <?php } ?>
    </div>
    <?php foreach ($items as $key => $value) { ?>
    <div id="htmlcaption<?php echo $key + 1; ?>" class="nivo-html-caption"><a href="<?php echo $value['link']; ?>"><?php echo $value['title']; ?></a></div>
    <?php } ?>
</div>