<div class="sitemap">
	<div class="sitemap-lvl1">
		<h2><a href="/">慧学知识框架</a></h2>
		{% for menu in sitemap['menus']['mainMenu'] %}
		<h3><a href="{{ menu['link'] }}">{{ menu['TreeData']['title'] }}</a></h3>
		<div class="sitemap-lvl2">
			{% for menu2 in menu['children'] %}
				{% if menu2['children'] %}
					<div class="sitemap-lvl3">
					<label><a href="{{ menu2['link'] }}">{{ menu2['TreeData']['title'] }}</a></label>：
					{% for menu3 in menu2['children'] %}
					<a href="{{ menu3['link'] }}">{{ menu3['TreeData']['title'] }}</a>
					{% endfor %}
					</div>
				{% else %}
				<a href="{{ menu2['link'] }}">{{ menu2['TreeData']['title'] }}</a>
				{% endif %}
			{% endfor %}
		</div>
		{% endfor %}
	</div>
	<div class="sitemap-lvl1">
		<h2><a href="/tag/">慧学财经词汇</a></h2>
		{% for pinyin,tags in sitemap['tags'] %}
		<h3><a href="/tag/{{ pinyin }}/">{{ pinyin }}</a></h3>
		<div class="sitemap-lvl2">
			{% for tag in tags %}
			<a href="{{ tag['link'] }}">{{ tag['name'] }}</a>
			{% endfor %}
		</div>
		{% endfor %}
	</div>
</div>