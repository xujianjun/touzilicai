<div class="row">

	<div class="col-xs-12 col-md-8">
		<?php echo $this->partial('widget/breadcrumb', array('breadcrumb' => $pageData['breadcrumb'])); ?>
		<?php echo $this->partial('widget/nodetag', array('nodetag' => $pageData['nodetag'])); ?>
		<?php echo $this->partial('widget/content', array('content' => $pageData['content']['node']['content'])); ?>
		<?php echo $this->partial('widget/siblings', array('items' => $pageData['siblings']['node']['items'])); ?>
		<?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['relation']['items'])); ?>
	</div>
	<div class="col-xs-6 col-md-4 xt-col-rgt">
		<?php echo $this->partial('widget/xtSidebars', array('xtSidebars' => $pageData['xtSidebars'])); ?>
		<?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['hot']['items'])); ?>
	</div>
</div>