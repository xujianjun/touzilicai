{{ partial("widget/breadcrumb", ['breadcrumb':pageData['breadcrumb']]) }}
{{ partial("widget/nodetag", ['nodetag':pageData['nodetag']]) }}
{{ partial("widget/content", ['content':pageData['content']['node']['content']]) }}
{{ partial("widget/nodeSiblings", ['nodeSiblings':pageData['nodeSiblings']]) }}
{{ partial("widget/panel", ['items':pageData['panel']['relation']['items']]) }}