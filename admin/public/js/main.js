$(function(){
	$('.breadCrumb input').on('click', function(){
		var btnType = $(this).attr('class');
		switch (btnType){
			case 'backBtn':
				window.history.back();
				break;
			case 'forwardBtn':
				window.history.forward();
				break;
			case 'refreshBtn':
				window.location.reload();
				break;
		}
		return false;
	});
	$('.CfgBtn').on('click', function(){
		var cfgName = $(this).attr('name');
		var fsElem = $('fieldset#'+cfgName);
		var requestDataStr = '';
		fsElem.find('input[type!=button]').each(function(){
			var attrName = $(this).attr('class');
			var attrVal = $(this).val();
			requestDataStr += requestDataStr ? '&'+attrName+'='+attrVal : attrName+'='+attrVal;
		});
		$.post( "/script/siteCfg.php", {act:'editCfg',type:cfgName,requestDataStr:requestDataStr}, function(data) {
			if (data[0]){
		  		alert(data[1]);
	   			window.location.reload();
	   		} else {
	   			alert(data[1]);
	   		}
		}, 'json');
	});

	$('.addMenu').click(function(){
		var title, link, order,parent;
		title = $('.editMenu .title').val();
		link = $('.editMenu .link').val();
		order = $('.editMenu .order').val();

		var parentStr = '';
		if ($(this).closest('.main').hasClass('main-mainMenu')){
			parent= $('.editMenu .parent').val();
			parentStr = '	<td style="width:10%;" class="parent">'
					 	+'		<span class="text">'+parent+'</span>'
					 	+'	</td>';
		}

		var key = parseInt($('.menuList tr:last').attr('class').replace('id_', ''))+1;
		var newItem = '<tr class="id_'+key+'">'
					 +'	<td style="width:30%;" class="title">'
					 +'		<span class="text">'+title+'</span>'
					 +' </td>'
				 	 +'	<td style="width:30%;" class="link">'
					 +'		<span class="text">'+link+'</span>'
					 +'	</td>'
					 +'	<td style="width:10%;" class="order">'
					 +'		<span class="text">'+order+'</span>'
					 +'	</td>'
					 +parentStr
					 +'	<td style="width:20%;">'
					 +'		<input type="button" class="edit_button" onclick="submit_button(\'edit_menu\', this)" value="编辑" />'
					 +'		<input type="button" class="del_button" onclick="submit_button(\'del_menu\', this)" value="删除" />'
					 +'		<input type="button" class="edit_menu edit_submit" onclick="submit_button(\'edit_menu_submit\', this)" value="更新" />'
					 +'		<input type="button" class="edit_menu edit_cancel" onclick="submit_button(\'edit_menu_cancel\', this)" value="取消" />'
					 +'	</td>'
					 +'</tr>';
		$('.menuList table tbody').append(newItem);
		toggleSaveButton();
	});

	$('.saveMenu').click(function(){
		var requestDataStr = '',title,link,order,parent,type='secMenu';
		$('.menuList tr[class*=id]').each(function (index, domEle) {
			title = $(domEle).find('.title .text').text();
			link = $(domEle).find('.link .text').text();
			order = $(domEle).find('.order .text').text();

			var prefix = index==0 ? '' : '&';
			if ($(domEle).closest('.main').hasClass('main-mainMenu')){
				parent= $(domEle).find('.parent .text').text();
				type='mainMenu';
				requestDataStr += prefix+'title[]='+title+'&link[]='+link+'&order[]='+order+'&parent[]='+parent;
			} else {
				requestDataStr += prefix+'title[]='+title+'&link[]='+link+'&order[]='+order;
			}


		});

		$.post( "/script/siteCfg.php", {act:'editCfg', type:type, requestDataStr:requestDataStr}, function(data){
		  	if (data[0]){
		  		alert(data[1]);
	   			window.location.reload();
	   		} else {
	   			alert(data[1]);
	   		}
	   		return false;
		}, 'json');
	});
	$('.clearMenu').click(function(){
		if (confirm('清空列表数据，请确认？')){
			$('.menuList tr:not(.tr-top)').remove();
			toggleSaveButton();
		}
	});

	$('.cancel_submit_article').click(function(){
		window.history.back();
	});
	if ($("#tag-dialog-form").length){
		$("#tag-dialog-form").dialog({
			autoOpen: false,
			height: 500,
			width: 550,
			modal: true,
			buttons: {
				"提交": function() {
					var id, name, desc;
					id = $('#tag-dialog-form .id').val();
					name = $('#tag-dialog-form .name').val();
					desc = um.getContent();
					$.post( "/script/tag.php", {act:'edit_tag',id:id,name:name,desc:desc}, function(data){
						if (data[0]){
					  		alert(data[1]);
				   			window.location.reload();
				   		} else {
				   			alert(data[1]);
				   		}
				   		return false;
					},'json');
				},
				"取消": function() {
					$(this).dialog("close");
				}
			},
			close: function() {}
		});
	}

	$('.submit_article').click(function(){
		var id=$('.id').val();
		var title = $('.title').val();
		var content = um.getContent();
		if (title.length<3 || um.getContentTxt().length<5){
			alert('标题或内容太短！');
			return false;
		}

		var cid = $('.category').val();

		var tids = '';
		$('#tagLeft option').each(function(){
			var tid = $(this).attr('value');
			tids += tids ? '|'+tid : tid;
		});
		console.log('id:'+id+',title:'+title+',content:'+content+',cid:'+cid+',tids:'+tids);
		$.post("/script/article.php", {act:'edit_article',id:id,title:title,content:content,cid:cid,tids:tids}, function(data){
			if (data[0]){
		  		alert(data[1]);
	   			window.location.href='/script/article.php?id='+data[2];
	   		} else {
	   			alert(data[1]);
	   		}
	   		return false;
		},'json');
	});

   	$('.cancel_submit_article').click(function(){
		window.history.back();
	});

	$('.submit_licai_product').click(function(){
		var id=$('.id').val();
		var type = $('.type').val();
		var risk = $('.risk').val();
		var company_name = $('.company_name').val();
		var company_logo = $('.company_logo').val();
		var name = $('.name').val();
		var profit_rate = $('.profit_rate').val();
		var profit_type = $('.profit_type').val();
		var cycle = $('.cycle').val();
		var start_money = $('.start_money').val();
		var start_unit = $('.start_unit').val();
		var end_time = $('.end_time').val();
		var url = $('.url').val();
		var attribute = $('.attribute').val();
		var is_hot = $('.is_hot').val();
		var hot_level = $('.hot_level').val();

		$.post("/script/licai_product.php", {act:'edit_licai_product',id:id,type:type,risk:risk,company_name:company_name,company_logo:company_logo,
											name:name,profit_rate:profit_rate,profit_type:profit_type,cycle:cycle,start_money:start_money,start_unit:start_unit,
											end_time:end_time,url:url,attribute:attribute,is_hot:is_hot,hot_level:hot_level}, function(data){
			if (data[0]){
		  		alert(data[1]);
	   			window.location.href='/script/licai_product.php?id='+data[2];
	   		} else {
	   			alert(data[1]);
	   		}
	   		return false;
		},'json');
	});

	$('.cancel_submit_licai_product').click(function(){
		window.history.back();
	});

	$('.article_filter .filterBtn').on('click', function(){
		var divElem = $('.article_filter');
		var from_id = divElem.find('.from_id').val();
		var to_id = divElem.find('.to_id').val();
		var title = divElem.find('.title').val();
		var cids = tids = '';
		$('.category option:selected').each(function(){
			var cid = $(this).val();
			cids += cids ? ','+ cid : cid;
		});
		$('.tag option:selected').each(function(){
			var tid = $(this).val();
			tids += tids ? ','+ tid : tid;
		});
		var order = divElem.find('.order').val();
		$.cookie('afFromId', from_id);
		$.cookie('afToId', to_id);
		$.cookie('afTitle', title);
		$.cookie('afCids', cids);
		$.cookie('afTids', tids);
		$.cookie('afOrder', order);

		window.location.reload();
	});
	$('.article_filter_reset').on('click', function(){
		$.removeCookie('afFromId');
		$.removeCookie('afToId');
		$.removeCookie('afTitle');
		$.removeCookie('afCids');
		$.removeCookie('afTids');
		$.removeCookie('afOrder');
		window.location.reload();
	});

	$('.tag_filter .filterBtn').on('click', function(){
		var divElem = $('.tag_filter');
		var from_id = divElem.find('.from_id').val();
		var to_id = divElem.find('.to_id').val();
		var title = divElem.find('.title').val();
		var order = divElem.find('.order').val();
		$.cookie('tfFromId', from_id);
		$.cookie('tfToId', to_id);
		$.cookie('tfTitle', title);
		$.cookie('tfOrder', order);

		window.location.reload();
	});
	$('.tag_filter_reset').on('click', function(){
		$.removeCookie('tfFromId');
		$.removeCookie('tfToId');
		$.removeCookie('tfTitle');
		$.removeCookie('tfOrder');
		window.location.reload();
	});

	$('.check_action a').on('click', function(){
		var type = $(this).attr('class');
		switch (type){
			case 'all':
				$('td input[type=checkbox]').each(function(){
					$(this).attr('checked', true);
				});
				break;
			case 'reverse':
				$('td input[type=checkbox]').each(function(){
					$(this).attr("checked", !this.checked);
				});
				break;
			case 'none':
				$('td input[type=checkbox]').each(function(){
					$(this).attr("checked", false);
				});
				break;
			default:
				break;
		}
		return false;
	});
	$('.check_action .checkBtn').on('click', function(){
		var ids = '';
		$('td input:checked').each(function(){
			var check_id = $(this).val();
			ids += ids ? ','+check_id : check_id;
		});
		var cid = $('.check_category').val();
		if (!ids || !cid){
			alert('参数错误');
			return false;
		}
		var requestData = {act:'edit_multi_article',ids:ids,cid:cid};
		$.post("/script/article.php", requestData, function(data){
			if (data[0]){
		  		alert(data[1]);
	   			window.location.reload();
	   		} else {
	   			alert(data[1]);
	   		}
	   		return false;
		},'json');
	});

});
function toggleSaveButton(){
	$('.saveMenu').css('background-color', 'red');
	$('.cancel_saveMenu').show();
}

function submit_button(act, elem){
	var elemTr = $(elem).closest('tr');
	switch (act){
		case 'edit_menu':
			toggleMenuEdit(elemTr, 'show');
			break;
		case 'del_menu':
			if (confirm('确认删除该条记录？')){
				elemTr.remove();
				toggleSaveButton();
			}
			break;
		case 'edit_menu_submit':
			var new_title = elemTr.find('.title .edit').val();
			elemTr.find('.title .text').text(new_title);

			var new_link= elemTr.find('.link .edit').val();
			elemTr.find('.link .text').text(new_link);

			var new_order= elemTr.find('.order .edit').val();
			elemTr.find('.order .text').text(new_order);

			if ($(elem).closest('.main').hasClass('main-mainMenu')){
				var new_parent= elemTr.find('.parent .edit').val();
				elemTr.find('.parent .text').text(new_parent);
			}

			toggleMenuEdit(elemTr, 'hide');
			toggleSaveButton();
			break;
		case 'edit_menu_cancel':
			toggleMenuEdit(elemTr, 'hide');
			break;
		default:
			break;
	}
	return false;
}

function toggleMenuEdit(elemTr, act){
	if (act=='show'){
		if (elemTr.find('.edit').length){
			elemTr.find('.edit').show();
		} else {
			var title, link, order;
			title = elemTr.find('.title .text').text();
			link = elemTr.find('.link .text').text();
			order = elemTr.find('.order .text').text();

			elemTr.find('.title').append('<input type="text" class="edit" value="'+title+'" />');
			elemTr.find('.link').append('<input type="text" class="edit" value="'+link+'"/>');
			elemTr.find('.order').append('<input type="text" class="edit" value="'+order+'" />');

			if (elemTr.closest('.main').hasClass('main-mainMenu')){
				var parent = elemTr.find('.parent .text').text();
				elemTr.find('.parent').append('<input type="text" class="edit" value="'+parent+'" />');
			}
		}

		elemTr.find('.text').hide();

		elemTr.find('input.edit_submit').show();
		elemTr.find('input.edit_cancel').show();
		elemTr.find('input.edit_button').hide();
		elemTr.find('input.del_button').hide();
	} else {
		elemTr.find('.text').show();
		elemTr.find('.edit').hide();

		elemTr.find('input.edit_submit').hide();
		elemTr.find('input.edit_cancel').hide();
		elemTr.find('input.edit_button').show();
		elemTr.find('input.del_button').show();
	}
}

function edit_tag(id){
	var trObj = $('tr.id_'+id);
	if (trObj.length){
		var id = trObj.find('.id').text(),
			name = trObj.find('.name').text(),
			desc = trObj.find('.desc').html();
		$("#tag-dialog-form").find('.id').val(id);
		$("#tag-dialog-form").find('.name').val(name);
		//$("#tag-dialog-form").find('.desc').val(desc);
		um.setContent(desc);
	} else {
		$("#tag-dialog-form").find('.id').val('');
		$("#tag-dialog-form").find('.name').val('');
		$("#tag-dialog-form").find('.desc').val('');
		um.setContent('');
	}
	$("#tag-dialog-form").dialog("open");
}
function del_tag(id,elem){
	if (confirm('确认删除该标签吗？')){
		$.post( "/script/tag.php", {act:'del_tag',id:id}, function(data){
			if (data[0]){
		  		alert(data[1]);
		  		$(elem).closest('tr').remove();
	   		} else {
	   			alert(data[1]);
	   		}
	   		return false;
		},'json');
	}
}

function del_article(id,elem){
	if (confirm('确认删除该文章吗？')){
		$.post( "/script/article.php", {act:'del_article',id:id}, function(data){
			if (data[0]){
		  		alert(data[1]);
		  		$(elem).closest('tr').remove();
	   		} else {
	   			alert(data[1]);
	   		}
	   		return false;
		}, 'json');
	}
}
function del_licai_product(id,elem){
	if (confirm('确认删除该理财产品吗？')){
		$.post( "/script/licai_product.php", {act:'del_licai_product',id:id}, function(data){
			if (data[0]){
		  		alert(data[1]);
		  		$(elem).closest('tr').remove();
	   		} else {
	   			alert(data[1]);
	   		}
	   		return false;
		}, 'json');
	}
}

function tagToLeft(){
	var nodes=$("#tagRight option:selected");
	$("#tagLeft").append(nodes);
}

function tagToRight(){
	var nodes=$("#tagLeft option:selected");
	$("#tagRight").append(nodes);
}
