
<div class="footer">
	<div class="sub-nav">
		{% for menu in menus['secMenu'] %}
		<a href="{{ menu['link'] }}">{{ menu['TreeData']['title'] }}</a>{% if !loop.last %}|{% endif %}
		{% endfor %}
	</div>
	<div class="copyright">
		<p>{{ siteConfig['footerCft']['cright'] }}</p>
		<p>{{ siteConfig['footerCft']['contentFrom'] }}</p>
		<p>{{ siteConfig['footerCft']['tips'] }}</p>
	</div>
</div>