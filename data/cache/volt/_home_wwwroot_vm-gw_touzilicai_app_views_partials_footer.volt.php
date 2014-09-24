
<div class="footer">
	<div class="sub-nav">
		<?php $v18178986931iterator = $menus['secMenu']; $v18178986931incr = 0; $v18178986931loop = new stdClass(); $v18178986931loop->length = count($v18178986931iterator); $v18178986931loop->index = 1; $v18178986931loop->index0 = 1; $v18178986931loop->revindex = $v18178986931loop->length; $v18178986931loop->revindex0 = $v18178986931loop->length - 1; ?><?php foreach ($v18178986931iterator as $menu) { ?><?php $v18178986931loop->first = ($v18178986931incr == 0); $v18178986931loop->index = $v18178986931incr + 1; $v18178986931loop->index0 = $v18178986931incr; $v18178986931loop->revindex = $v18178986931loop->length - $v18178986931incr; $v18178986931loop->revindex0 = $v18178986931loop->length - ($v18178986931incr + 1); $v18178986931loop->last = ($v18178986931incr == ($v18178986931loop->length - 1)); ?>
		<a href="<?php echo $menu['link']; ?>"><?php echo $menu['TreeData']['title']; ?></a><?php if (!$v18178986931loop->last) { ?>|<?php } ?>
		<?php $v18178986931incr++; } ?>
	</div>
	<div class="copyright">
		<p><?php echo $siteConfig['footerCft']['cright']; ?></p>
		<p><?php echo $siteConfig['footerCft']['contentFrom']; ?></p>
		<p><?php echo $siteConfig['footerCft']['tips']; ?></p>
	</div>
</div>