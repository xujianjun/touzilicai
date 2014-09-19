
<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><b><?php echo $items[0]['title']; ?></b></h3>
    </div>
    <div class="panel-body">
      	<ul class="tl-panel-list list-unstyled">
      		<?php foreach ($items[0]['data'] as $value) { ?>
			<li><a href="<?php echo $value['link']; ?>"><?php echo $value['TreeData']['title']; ?></a></li>
			<?php } ?>
	  	</ul>
    </div>
  </div>