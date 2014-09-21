<div id="slider-wrapper">
    <div id="slider" class="nivoSlider">
    	{% for key,value in items %}
        <a href="#"><img src="{{ value['img_path'] }}" alt="" title="#htmlcaption{{ key+1 }}" /></a>
        {% endfor %}
    </div>
    {% for key,value in items %}
    <div id="htmlcaption{{ key+1 }}" class="nivo-html-caption"><a href="{{ value['link'] }}">{{ value['title'] }}</a></div>
    {% endfor %}
</div>