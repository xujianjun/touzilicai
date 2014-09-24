
<div class="xtsidebar">
	<ul class="list-unstyled list">
		{% for xtSidebar in xtSidebars %}
		<li>
			<a href="#">{{ xtSidebar['TreeData']['title']|trim }}</a>
			{% if xtSidebar['children']|length %}
			<ul class="list-unstyled sub-list {% if xtSidebar['current'] %}active{% endif %}">
				{% for value in xtSidebar['children'] %}
				<li {% if value['current'] %}class="active"{% endif %}><a href="{{ value['link'] }}">{{ value['TreeData']['title']|trim }}</a></li>
				{% endfor %}
			</ul>
			{% endif %}
		</li>
		{% endfor %}
	</ul>
</div>