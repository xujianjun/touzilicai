
<div class="xtsidebar">
	<ul class="list-unstyled list">
		{% for xtSidebar in xtSidebars %}
		<li>
			<a href="#">{{ xtSidebar['TreeData']['title']|trim }}</a>
			{% if xtSidebar['children']|length %}
			<ul class="list-unstyled sub-list {% if xtSidebar['current'] %}active{% endif %}">
				{% for value in xtSidebar['children'] %}
				<li><a href="{{ value['link'] }}" {% if value['current'] %}class="active"{% endif %}>{{ value['TreeData']['title']|trim }}</a></li>
				{% endfor %}
			</ul>
			{% endif %}
		</li>
		{% endfor %}
	</ul>
</div>