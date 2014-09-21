
<div class="row">
	<div class="col-xs-12 col-md-8"><?php echo $this->partial('widget/slider', array('blockName' => $pageData['slider']['school']['blockName'], 'items' => $pageData['slider']['school']['items'])); ?></div>
    <div class="col-xs-6 col-md-4"><?php echo $this->partial('widget/dailyword', array('dailyword' => $pageData['dailyword'])); ?></div>
</div>
<div class="row">
	<div class="layout-title">股票学堂</div>
	<div class="col-xs-12 col-md-8">
		<div class="row">
        	<div class="col-md-6"><?php echo $this->partial('widget/navTab', array('blockName' => $pageData['navTab']['stockSchool_basic_method']['blockName'], 'items' => $pageData['navTab']['stockSchool_basic_method']['items'])); ?></div>
        	<div class="col-md-6"><?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['stockSchool_trade']['items'])); ?></div>
      	</div>
	</div>
    <div class="col-xs-6 col-md-4"><?php echo $this->partial('widget/hangqing', array('hangqing' => $pageData['hangqing'])); ?></div>
</div>
<div class="row">
	<div class="layout-title">基金学堂</div>
	<div class="col-xs-12 col-md-8">
		<div class="row">
        	<div class="col-md-6"><?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['fundSchool_basic']['items'])); ?></div>
        	<div class="col-md-6"><?php echo $this->partial('widget/navTab', array('blockName' => $pageData['navTab']['fundSchool_open_close']['blockName'], 'items' => $pageData['navTab']['fundSchool_open_close']['items'])); ?></div>
      	</div>
      	<div class="row">
        	<div class="col-md-6"><?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['fundSchool_money']['items'])); ?></div>
        	<div class="col-md-6"><?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['fundSchool_trade']['items'])); ?></div>
      	</div>
	</div>
    <div class="col-xs-6 col-md-4">fund</div>
</div>
<div class="row">
	<div class="layout-title">外汇学堂</div>
	<div class="col-xs-12 col-md-8">
		<div class="row">
        	<div class="col-md-6"><?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['forexSchool_basic']['items'])); ?></div>
        	<div class="col-md-6"><?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['forexSchool_trade']['items'])); ?></div>
      	</div>
	</div>
    <div class="col-xs-6 col-md-4">waihuilv</div>
</div>
<div class="row">
	<div class="layout-title">贵金属学堂</div>
	<div class="col-xs-12 col-md-8">
		<div class="row">
        	<div class="col-md-6"><?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['metalSchool_basic']['items'])); ?></div>
        	<div class="col-md-6"><?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['metalSchool_trade']['items'])); ?></div>
      	</div>
	</div>
    <div class="col-xs-6 col-md-4">metal</div>
</div>
<div class="row">
	<div class="layout-title">其他学堂</div>
	<div class="col-xs-12 col-md-8">
		<div class="row">
        	<div class="col-md-6"><?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['otherSchool_bank']['items'])); ?></div>
        	<div class="col-md-6"><?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['otherSchool_insurance']['items'])); ?></div>
      	</div>
      	<div class="row">
        	<div class="col-md-6"><?php echo $this->partial('widget/navTab', array('blockName' => $pageData['navTab']['otherSchool_spot_futures']['blockName'], 'items' => $pageData['navTab']['otherSchool_spot_futures']['items'])); ?></div>
        	<div class="col-md-6"><?php echo $this->partial('widget/panel', array('items' => $pageData['panel']['otherSchool_gold']['items'])); ?></div>
      	</div>
	</div>
    <div class="col-xs-6 col-md-4">licaigongju</div>
</div>
