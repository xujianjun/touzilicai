
<div class="row">
	<div class="col-xs-12 col-md-8">
		<?php echo $this->getContent(); ?>
	</div>
    <div class="col-xs-6 col-md-4">
    	<?php echo $this->partial('widget/cidian', array('cidian' => $pageData['cidian'])); ?>
    	<?php echo $this->partial('widget/lilv', array('lilv' => $pageData['lilv'])); ?>
    	<?php echo $this->partial('widget/listGroup', array('items' => $pageData['listGroup']['wealth_plan']['items'])); ?>
	</div>
</div>
