
  <div class="tl-tag-list list-group">
  	<ul class="list-unstyled">
  	{% for item in taglist['items'] %}
    <li>
      <a href="/tag/{{ item['id'] }}.html">{{ item['name'] }}</a>
    </li>
    {% endfor %}
    </ul>
    {{ taglist['pager'] }}
  </div>
