
<div class="footer">
	<div class="sub-nav">
		{% for menu in menus['secMenu'] %}
		<a href="{{ menu['link'] }}">{{ menu['TreeData']['title'] }}</a>{% if !loop.last %}|{% endif %}
		{% endfor %}
	</div>
	<div class="copyright">
		<p>CopyRight © 2014 <a target="_blank" href="http://www.miitbeian.gov.cn/">鲁ICP备14026710号-1</a> 慧学屋</p>
		<p>本站资源多收集于网络,版权归原作者所有,若有侵权,请联系我们. admin@licaimap.com</p>
		<p>声明：本站发布的所有资料或图片仅仅用于学习与交流，投资者依据本网站提供的内容进行投资所造成的盈亏与本网站无关。</p>
	</div>
</div>