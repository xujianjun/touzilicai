
  <div class="tl-list list-group">
  	<h1>{{ title }}</h1>
  	{% for item in items %}
    <div class="list-group-item">
      <div class="list-dtime"></div>
      <a href="{{ item['link'] }}"><h4 class="list-group-item-heading">{{ item['TreeData']['title'] }}</h4></a>
      <p class="list-group-item-text">{{ item['TreeData']['summary'] }}</p>
    </div>
    {% endfor %}
    <div class="list-pager">{{ pager }}</div>
  </div>
