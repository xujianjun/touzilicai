
<div class="footer">
	<div class="sub-nav">
		<?php $v2007799421iterator = $menus['secMenu']; $v2007799421incr = 0; $v2007799421loop = new stdClass(); $v2007799421loop->length = count($v2007799421iterator); $v2007799421loop->index = 1; $v2007799421loop->index0 = 1; $v2007799421loop->revindex = $v2007799421loop->length; $v2007799421loop->revindex0 = $v2007799421loop->length - 1; ?><?php foreach ($v2007799421iterator as $menu) { ?><?php $v2007799421loop->first = ($v2007799421incr == 0); $v2007799421loop->index = $v2007799421incr + 1; $v2007799421loop->index0 = $v2007799421incr; $v2007799421loop->revindex = $v2007799421loop->length - $v2007799421incr; $v2007799421loop->revindex0 = $v2007799421loop->length - ($v2007799421incr + 1); $v2007799421loop->last = ($v2007799421incr == ($v2007799421loop->length - 1)); ?>
		<a href="<?php echo $menu['link']; ?>"><?php echo $menu['TreeData']['title']; ?></a><?php if (!$v2007799421loop->last) { ?>|<?php } ?>
		<?php $v2007799421incr++; } ?>
	</div>
	<div class="copyright">
		<p><?php echo $siteConfig['footerCft']['cright']; ?></p>
		<p><?php echo $siteConfig['footerCft']['contentFrom']; ?></p>
		<p><?php echo $siteConfig['footerCft']['tips']; ?></p>
	</div>
</div>