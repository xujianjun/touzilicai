
<div class="row">
	<div class="col-xs-12 col-md-8 l-p-left">
		{{ content() }}
	</div>
    <div class="col-xs-6 col-md-4 l-p-right">
    	{{ partial("widget/cidian", ['cidian':pageData['cidian']]) }}
    	{{ partial("widget/lilv", ['lilv':pageData['lilv']]) }}
    	{{ partial("widget/listGroup", ['items':pageData['listGroup']['wealth_plan']['items']]) }}
	</div>
</div>
