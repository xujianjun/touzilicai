
<div class="header">
	<div class="header-top">
		<div class="logo"><a href="#"><img src="/img/logo.jpg" /></a></div>
		<div class="search-box">
			<div class="col-lg-6">
			    <div class="input-group">
			      <input type="text" class="form-control" placeholder="请输入关键字" />
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">Go!</button>
			      </span>
			    </div>
			  </div>
		</div>
	</div>
	<div class="clear"></div>

	<!--导航-->
	<div class="header-nav">
	<ul id="tl-nav">
		<li class="nav-item {% if server['REQUEST_URI']=='/' %} active{% endif %}">
			<a href="/" class="nav-link">首页</a>
		</li>
		{% for menu in menus['mainMenu'] %}
		<li class="nav-item {% if menu['current'] %} active{% endif %}">
			<a href="{{ menu['link'] }}" class="nav-link">{{ menu['TreeData']['title'] }}</a>
			<div class="nav-dropdown {% if loop.index>2 %} nav-dropdown-align-right{% endif %}">
				<div class="nav-dropdown-trending">
					<ul class="trending">
						{% for recommendNode in menu['recommendNodes'] %}
						<li><a href="{{ recommendNode['link'] }}">{{ recommendNode['TreeData']['title'] }}</a></li>
						{% endfor %}
					</ul>
					<p class="nav-dropdown-entry"><a href="{{ menu['link'] }}">查看更多"{{ menu['TreeData']['title'] }}"&gt;&gt;</a></p>
				</div>
				<div class="nav-dropdown-channel">
					<ul class="channel">
						{% for subMenu in menu['children'] %}
						<li><a href="{{ subMenu['link'] }}">{{ subMenu['TreeData']['title'] }}</a></li>
						{% endfor %}
					</ul>
				</div>
			</div>
		</li>
		{% endfor %}
	</ul>
	</div>
</div>