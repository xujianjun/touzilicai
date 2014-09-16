
<div class="tl-nav-tab">
	<ul class="nav nav-tabs nav-justified">
	  {% for key,item in items %}
	  <li {% if key==0 %}class="active"{% endif %}><a href="#{{ blockName }}-tab{{ key }}" data-toggle="tab"><b>{{ item['title'] }}</b></a></li>
	  {% endfor %}
	</ul>
	<div class="tab-content">
		{% for key,item in items %}

		<div class="tab-pane fade {% if key==0 %}active in{% endif %}" id="{{ blockName }}-tab{{ key }}">
			<ul class="tl-panel-list list-unstyled">
				{% for value in item['data'] %}
				<li><a href="{{ value['path'] }}">{{ value['TreeData']['title'] }}</a></li>
				{% endfor %}
			</ul>
		</div>
		{% endfor %}
	</div>
</div>
