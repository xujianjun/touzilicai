<div class="cidian" id="tagscloud">
  {% for key,value in cidian %}
  <a href="/tag/{{ value['id'] }}.html" class="tagbg{{ value['randBg'] }}">{{ value['name'] }}</a>
  {% endfor %}
</div>
