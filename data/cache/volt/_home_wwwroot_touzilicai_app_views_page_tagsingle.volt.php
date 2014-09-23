<?php echo $this->partial('widget/breadcrumb', array('breadcrumb' => $pageData['breadcrumb'])); ?>
<?php echo $this->partial('widget/content', array('content' => $pageData['content']['tag']['content'])); ?>
<?php echo $this->partial('widget/siblings', array('items' => $pageData['siblings']['tag']['items'])); ?>
<?php echo $this->partial('widget/list', array('title' => $pageData['list']['tagnode']['title'], 'items' => $pageData['list']['tagnode']['items'])); ?>