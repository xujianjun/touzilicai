<div class="row">

	<div class="col-xs-12 col-md-8">
		{{ partial("widget/breadcrumb", ['breadcrumb':pageData['breadcrumb']]) }}
		{{ partial("widget/list", ['title':pageData['list']['node']['title'],'items':pageData['list']['node']['items'],'pager':pageData['list']['node']['pager']]) }}
	</div>
	<div class="col-xs-6 col-md-4 xt-col-rgt">
		{{ partial("widget/xtSidebars", ['xtSidebars':pageData['xtSidebars']]) }}
		{{ partial("widget/panel", ['items':pageData['panel']['hot']['items']]) }}
	</div>
</div>