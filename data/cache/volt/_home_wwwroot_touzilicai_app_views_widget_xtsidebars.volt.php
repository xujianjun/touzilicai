
<div class="xtsidebar">
	<ul class="list-unstyled list">
		<?php foreach ($xtSidebars as $xtSidebar) { ?>
		<li>
			<a href="#"><?php echo trim($xtSidebar['TreeData']['title']); ?></a>
			<?php if ($this->length($xtSidebar['children'])) { ?>
			<ul class="list-unstyled sub-list <?php if ($xtSidebar['current']) { ?>active<?php } ?>">
				<?php foreach ($xtSidebar['children'] as $value) { ?>
				<li><a href="<?php echo $value['link']; ?>" <?php if ($value['current']) { ?>class="active"<?php } ?>><?php echo trim($value['TreeData']['title']); ?></a></li>
				<?php } ?>
			</ul>
			<?php } ?>
		</li>
		<?php } ?>
	</ul>
</div>