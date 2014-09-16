
<div class="row">
	<div class="col-xs-12 col-md-8">
		{{ content() }}
	</div>
    <div class="col-xs-6 col-md-4">
    	{{ partial("widget/cidian", ['cidian':pageData['cidian']]) }}
    	{{ partial("widget/lilv", ['lilv':pageData['lilv']]) }}
    	{{ partial("widget/listGroup", ['items':pageData['listGroup']['wealth_plan']['items']]) }}
	</div>
</div>
