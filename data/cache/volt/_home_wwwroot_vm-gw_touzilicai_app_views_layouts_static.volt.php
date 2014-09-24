
<div class="row">
	<div class="col-xs-12 col-md-8 l-p-left">
		<?php echo $this->getContent(); ?>
	</div>
    <div class="col-xs-6 col-md-4 l-p-right">
    	<?php echo $this->partial('widget/cidian', array('cidian' => $pageData['cidian'])); ?>
    	<?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['hot']['items'])); ?>
    	<?php echo $this->partial('widget/lilv', array('lilv' => $pageData['lilv'])); ?>
	</div>
</div>
