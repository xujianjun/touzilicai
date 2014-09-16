
$(function(){
	/*
  $('.nav-tabs a').hover(function (e) {
    e.preventDefault();
    $(this).tab('show');
  })*/
  $('.cidian a').tagcloud();
  $('#slider').nivoSlider();

  $('.xtsidebar > ul > li > span').on('click', function(){
  	$(this).closest('li').find('.sub-list').slideToggle();
  });
  $('.xtsidebar .sub-list li').on('click', function(evt){
  	evt.preventDefault();
  });

  $('.xtsidebar ul.list > li').on('click', function(){
  	$(this).siblings('li').find('.sub-list').removeClass('active');
  	$(this).find('.sub-list').toggleClass('active');
  	return false;
  });
  $('.xtsidebar ul.sub-list > li').on('click', function(){
  	var aLink = $(this).find('a').attr('href');
  	window.location = aLink;
  	return false;
  });

  $('.search-box button.btn').on('click', function(){
  	var keyword = $('.search-box input.form-control').val();
  	if (!keyword){
  		$('.search-box input.form-control').focus();
  		return false;
  	}
  	var searchLink = '/search/'+keyword+'/';
  	window.location = searchLink;
  	return false;
  });
  $('.page-search-box button.btn').on('click', function(){
  	var keyword = $('.page-search-box input.form-control').val();
  	if (!keyword){
  		$('.page-search-box input.form-control').focus();
  		return false;
  	}
  	var searchLink = '/search/'+keyword+'/';
  	window.location = searchLink;
  	return false;
  });

  $.fn.dropdown = function(settings){
		var defaults = {
			dropdownEl: '.dropdown-menu',
			openedClass: 'dropdown-open',
			delayTime: 100
		}
		var opts = $.extend(defaults, settings);
		return this.each(function(){
			var curObj = null;
			var preObj = null;
			var openedTimer = null;
			var closedTimer = null;
			$(this).hover(function(){
				if(openedTimer)
				clearTimeout(openedTimer);
				curObj = $(this);
				openedTimer = setTimeout(function(){
					curObj.addClass(opts.openedClass).find(opts.dropdownEl).show();
				},opts.delayTime);
				preObj = curObj;
			},function(){
				if(openedTimer)
				clearTimeout(openedTimer);
				openedTimer = setTimeout(function(){
					preObj.removeClass(opts.openedClass).find(opts.dropdownEl).hide();
				},opts.delayTime);
			});
			//点击事件关闭菜单
			$(this).bind('click', function(){
				if(openedTimer)
				clearTimeout(openedTimer);
				openedTimer = setTimeout(function(){
					preObj.removeClass(opts.openedClass).find(opts.dropdownEl).hide();
				},opts.delayTime);
			});
		});
	};

	//下拉菜单
	$('#tl-nav .nav-item').dropdown({
		dropdownEl:'.nav-dropdown',
		openedClass:'hover'
	});
});