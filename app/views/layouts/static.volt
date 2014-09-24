
<div class="row">
	<div class="col-xs-12 col-md-8 l-p-left">
		{{ content() }}
	</div>
    <div class="col-xs-6 col-md-4 l-p-right">
    	{{ partial("widget/cidian", ['cidian':pageData['cidian']]) }}
    	{{ partial("widget/panel", ['items':pageData['panel']['hot']['items']]) }}
    	{{ partial("widget/lilv", ['lilv':pageData['lilv']]) }}
	</div>
</div>
