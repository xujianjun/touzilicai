{{ partial("widget/breadcrumb", ['breadcrumb':pageData['breadcrumb']]) }}
{{ partial("widget/content", ['content':pageData['content']['tag']['content']]) }}
{{ partial("widget/siblings", ['items':pageData['siblings']['tag']['items']]) }}
{{ partial("widget/list", ['title':pageData['list']['tagnode']['title'],'items':pageData['list']['tagnode']['items']]) }}