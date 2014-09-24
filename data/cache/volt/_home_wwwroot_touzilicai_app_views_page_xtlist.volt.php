<div class="row">

	<div class="col-xs-12 col-md-8">
		<?php echo $this->partial('widget/breadcrumb', array('breadcrumb' => $pageData['breadcrumb'])); ?>
		<?php echo $this->partial('widget/list', array('title' => $pageData['list']['node']['title'], 'items' => $pageData['list']['node']['items'], 'pager' => $pageData['list']['node']['pager'])); ?>
	</div>
	<div class="col-xs-6 col-md-4 xt-col-rgt">
		<?php echo $this->partial('widget/xtSidebars', array('xtSidebars' => $pageData['xtSidebars'])); ?>
		<?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['hot']['items'])); ?>
	</div>
</div>