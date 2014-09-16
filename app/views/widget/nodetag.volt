<div class="tl-nodetag">
	标签：
	{% for value in nodetag %}
    <a href="/tag/{{ value['tid'] }}.html">{{ value['Tags']['name'] }}</a>
    {% endfor %}
</div>