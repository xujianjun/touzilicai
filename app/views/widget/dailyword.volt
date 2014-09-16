
<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><b>{{ dailyword['title'] }}</b></h3>
    </div>
    <div class="panel-body">
    	<div class="dailyword">
    		<a href="/tag/{{ dailyword['word']['id'] }}.html">{{ dailyword['word']['name'] }}</a>
      		<p>{{ dailyword['word']['description'] }}</p>
    	</div>
    </div>
  </div>