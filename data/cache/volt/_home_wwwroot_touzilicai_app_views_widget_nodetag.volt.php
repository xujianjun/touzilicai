<div class="tl-nodetag">
	标签：
	<?php foreach ($nodetag as $value) { ?>
    <a href="/tag/<?php echo $value['tid']; ?>.html"><?php echo $value['Tags']['name']; ?></a>
    <?php } ?>
</div>