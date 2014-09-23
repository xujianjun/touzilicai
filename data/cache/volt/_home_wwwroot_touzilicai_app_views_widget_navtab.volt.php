
<div class="tl-nav-tab">
	<ul class="nav nav-tabs nav-justified">
	  <?php foreach ($items as $key => $item) { ?>
	  <li <?php if ($key == 0) { ?>class="active"<?php } ?>><a href="#<?php echo $blockName; ?>-tab<?php echo $key; ?>" data-toggle="tab"><b><?php echo $item['title']; ?></b></a></li>
	  <?php } ?>
	</ul>
	<div class="tab-content">
		<?php foreach ($items as $key => $item) { ?>

		<div class="tab-pane fade <?php if ($key == 0) { ?>active in<?php } ?>" id="<?php echo $blockName; ?>-tab<?php echo $key; ?>">
			<ul class="tl-panel-list list-unstyled">
				<?php foreach ($item['data'] as $value) { ?>
				<li><a href="<?php echo $value['link']; ?>"><?php echo $value['TreeData']['title']; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
	</div>
</div>
