
<div class="widget widget-panel2">
	<div class="w-title">
		<div class="title fleft"><h3><b><a href="" target="_blank">{{ items[0]['title'] }}</a></b></h3></div>
		<div class="seperate fleft">&nbsp;</div>
		<div class="more fright"><a href="" target="_blank">更多&gt;&gt;</a></div>
	</div>
	<div class="clear"></div>
	<div class="w-header">
		<a class="fleft" href="" target="_blank"><img src="http://portrait4.sinaimg.cn/1233227211/blog/180" width="80" height="80" alt="鲁政委：欧元区QE让人民币走到十字路口"></a>
		<div class="fright">
			<h3><a href="" target="_blank">叶檀：并购重组的盛宴正在来临</a></h3>
			<p>随着房地产数据继续下行，中国制造业日子将更加艰难，但制造业上市…<a href="" target="_blank">[详细</a>]</p>
		</div>
	</div>
	<div class="clear"></div>
	<ul class="w-list">
		{% for value in items[0]['data'] %}
        <li><a href="{{ value['link'] }}">{{ value['TreeData']['title'] }}</a></li>
        {% endfor %}
	</ul>
</div>