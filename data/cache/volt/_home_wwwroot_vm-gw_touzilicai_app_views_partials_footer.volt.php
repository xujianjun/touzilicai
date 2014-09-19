
<div class="footer">
	<div class="sub-nav">
		<?php $v1735845151iterator = $menus['secMenu']; $v1735845151incr = 0; $v1735845151loop = new stdClass(); $v1735845151loop->length = count($v1735845151iterator); $v1735845151loop->index = 1; $v1735845151loop->index0 = 1; $v1735845151loop->revindex = $v1735845151loop->length; $v1735845151loop->revindex0 = $v1735845151loop->length - 1; ?><?php foreach ($v1735845151iterator as $menu) { ?><?php $v1735845151loop->first = ($v1735845151incr == 0); $v1735845151loop->index = $v1735845151incr + 1; $v1735845151loop->index0 = $v1735845151incr; $v1735845151loop->revindex = $v1735845151loop->length - $v1735845151incr; $v1735845151loop->revindex0 = $v1735845151loop->length - ($v1735845151incr + 1); $v1735845151loop->last = ($v1735845151incr == ($v1735845151loop->length - 1)); ?>
		<a href="<?php echo $menu['link']; ?>"><?php echo $menu['TreeData']['title']; ?></a><?php if (!$v1735845151loop->last) { ?>|<?php } ?>
		<?php $v1735845151incr++; } ?>
	</div>
	<div class="copyright">
		<p>CopyRight © 2014 <a target="_blank" href="http://www.miitbeian.gov.cn/">鲁ICP备14026710号-1</a> 慧学屋</p>
		<p>本站资源多收集于网络,版权归原作者所有,若有侵权,请联系我们. admin@licaimap.com</p>
		<p>声明：本站发布的所有资料或图片仅仅用于学习与交流，投资者依据本网站提供的内容进行投资所造成的盈亏与本网站无关。</p>
	</div>
</div>