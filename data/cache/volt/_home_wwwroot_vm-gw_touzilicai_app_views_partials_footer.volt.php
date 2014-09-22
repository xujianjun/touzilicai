
<div class="footer">
	<div class="sub-nav">
		<?php $v1735845151iterator = $menus['secMenu']; $v1735845151incr = 0; $v1735845151loop = new stdClass(); $v1735845151loop->length = count($v1735845151iterator); $v1735845151loop->index = 1; $v1735845151loop->index0 = 1; $v1735845151loop->revindex = $v1735845151loop->length; $v1735845151loop->revindex0 = $v1735845151loop->length - 1; ?><?php foreach ($v1735845151iterator as $menu) { ?><?php $v1735845151loop->first = ($v1735845151incr == 0); $v1735845151loop->index = $v1735845151incr + 1; $v1735845151loop->index0 = $v1735845151incr; $v1735845151loop->revindex = $v1735845151loop->length - $v1735845151incr; $v1735845151loop->revindex0 = $v1735845151loop->length - ($v1735845151incr + 1); $v1735845151loop->last = ($v1735845151incr == ($v1735845151loop->length - 1)); ?>
		<a href="<?php echo $menu['link']; ?>"><?php echo $menu['TreeData']['title']; ?></a><?php if (!$v1735845151loop->last) { ?>|<?php } ?>
		<?php $v1735845151incr++; } ?>
	</div>
	<div class="copyright">
		<p><?php echo $siteConfig['footerCft']['cright']; ?></p>
		<p><?php echo $siteConfig['footerCft']['contentFrom']; ?></p>
		<p><?php echo $siteConfig['footerCft']['tips']; ?></p>
	</div>
</div>