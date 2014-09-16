<div class="cidian">
  {% for key,value in cidian %}
  <a href="/tag/{{ value['id'] }}.html" rel="{{ value['cloudSize'] }}">{{ value['name'] }}</a>
  {% endfor %}
</div>
