<div class="row">

	<div class="col-xs-12 col-md-8">
		{{ partial("widget/breadcrumb", ['breadcrumb':pageData['breadcrumb']]) }}
		{{ partial("widget/nodetag", ['nodetag':pageData['nodetag']]) }}
		{{ partial("widget/content", ['content':pageData['content']['node']['content']]) }}
		{{ partial("widget/nodeSiblings", ['nodeSiblings':pageData['nodeSiblings']]) }}
		{{ partial("widget/panel", ['items':pageData['panel']['relation']['items']]) }}
	</div>
	<div class="col-xs-6 col-md-4 xt-col-rgt">
		{{ partial("widget/xtSidebars", ['xtSidebars':pageData['xtSidebars']]) }}
		{{ partial("widget/panel", ['items':pageData['panel']['hot']['items']]) }}
	</div>
</div>