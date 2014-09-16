
<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><b>{{ items[0]['title'] }}</b></h3>
    </div>
    <div class="panel-body">
      	<ul class="tl-panel-list list-unstyled">
      		{% for value in items[0]['data'] %}
			<li><a href="{{ value['link'] }}">{{ value['TreeData']['title'] }}</a></li>
			{% endfor %}
	  	</ul>
    </div>
  </div>