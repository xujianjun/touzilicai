<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Title</title>
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" href="./../jstree-v3/dist/themes/default/style.min.css" />
		<link rel="stylesheet" href="./../jstree-v3/dist/jquery-ui/themes/base/jquery.ui.all.css">
		<style>
		html, body { background:#ebebeb; font-size:10px; font-family:Verdana; margin:0; padding:0; }
		.clear{clear:both;}
		#container { min-width:320px; margin:0px auto 0 auto; background:white; border-radius:0px; padding:0px; overflow:hidden; }
		#tree { float:left; min-width:319px; border-right:1px solid silver; overflow:auto; padding:0px 0;}
		#tree ul{top:30px;}
		#data { margin-left:320px;overflow:auto;}
		#data textarea { margin:0; padding:0; height:100%; width:100%; border:0; background:white; display:block; line-height:18px; }
		#data, #code { font: normal normal normal 14px/22px 'Consolas', monospace !important; }

		#tree .folder { background:url('./../jstree-v3/content-manager/file_sprite.png') right bottom no-repeat; }
		#tree .file { background:url('./../jstree-v3/content-manager/file_sprite.png') 0 0 no-repeat; }

		#data a{text-decoration:none;}
		#data .content.path{padding:10px;}
		#data .content.default{padding:10px 20px;}

		.top-search{
			top: 0;
			position: fixed;
			background-color: #fff;
			z-index: 1;
		}
		.article-lists{list-style-type: decimal;}
		.edit_article_btn{margin-left:20px;}
		.top-search input{display:inline;}
		#searchTree{background-color: #fff;}

		.tagSelects{padding-left:50px;display:none;}
		.tagSelect{float:left;width:200px;height:300px;}
		.tagBtns{float:left;width:60px;padding-top:100px;}
		.tagBtns input{margin:10px 10px 0;width:40px;}
		</style>
		<link rel="stylesheet" href="./../jstree-v3/dist/jquery-ui/demos.css">

		<script src="./../jstree-v3/dist/libs/jquery.js"></script>
		<script src="./../jstree-v3/dist/jstree.min.js"></script>

		<script src="./../jstree-v3/dist/jquery-ui/ui/jquery.ui.core.js"></script>
		<script src="./../jstree-v3/dist/jquery-ui/ui/jquery.ui.widget.js"></script>
		<script src="./../jstree-v3/dist/jquery-ui/ui/jquery.ui.mouse.js"></script>
		<script src="./../jstree-v3/dist/jquery-ui/ui/jquery.ui.button.js"></script>
		<script src="./../jstree-v3/dist/jquery-ui/ui/jquery.ui.draggable.js"></script>
		<script src="./../jstree-v3/dist/jquery-ui/ui/jquery.ui.position.js"></script>
		<script src="./../jstree-v3/dist/jquery-ui/ui/jquery.ui.resizable.js"></script>
		<script src="./../jstree-v3/dist/jquery-ui/ui/jquery.ui.button.js"></script>
		<script src="./../jstree-v3/dist/jquery-ui/ui/jquery.ui.dialog.js"></script>
		<script src="./../jstree-v3/dist/jquery-ui/ui/jquery.ui.effect.js"></script>

		<link href="./../umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
	    <script src="./../umeditor/umeditor.config.js"></script>
	    <script src="./../umeditor/umeditor.min.js"></script>
	    <script src="./../umeditor/lang/zh-cn/zh-cn.js"></script>

	</head>
	<body>
		<div id="dialog-form" title="编辑文章">
			<form>
				<fieldset>
					<label for="id">ID</label>
					<input type="text" name="id" id="id" readonly="readonly" class="text ui-widget-content ui-corner-all" />
					<label for="title">标题</label>
					<input type="text" name="title" id="title" readonly="readonly" class="text ui-widget-content ui-corner-all" />
					<label for="tags">标签</label><button type="button" class="tagOpt-btn">显示标签栏</button>
					<div class="tagSelects">
						<div class="leftSelect">
							<select name="tag" id="tagLeft" class="tag tagSelect" multiple="multiple">
							</select>
						</div>
						<div class="tagBtns">
							<input type="button" id="btnToLeft" onclick="tagToLeft();" value="左移" title="左移选中"/><br />
							<input type="button" id="btnToRight" onclick="tagToRight();" value="右移" title="右移选中"/>
						</div>
						<div class="rightSelect">
							<select name="tag" id="tagRight" class="tagSelect" multiple="multiple">
			    				<option value="">test1</option>
			    				<option value="">test2</option>
							</select>
						</div>
						<div class="clear"></div>
					</div><br />
					<label for="summary">摘要</label>
					<textarea name="summary" id="summary" rows="5" cols="90"></textarea><br />
					<label for="content">内容</label>
					<script type="text/plain" id="content" style="width:700px;height:240px;"></script>
				</fieldset>
			</form>
		</div>
		<div id="dialog-form-titleEn" title="编辑标题（EN）">
			<form>
				<fieldset>
					<label for="id">ID</label>
					<input type="text" name="id" id="id" readonly="readonly" class="text ui-widget-content ui-corner-all" />
					<label for="title">标题</label>
					<input type="text" name="title" id="title" readonly="readonly" class="text ui-widget-content ui-corner-all" />
					<label for="title_en">标题（EN)</label>
					<input type="text" name="title_en" id="title_en" class="text ui-widget-content ui-corner-all" />
				</fieldset>
			</form>
		</div>
		<div id="container" role="main">
			<div id="tree"></div>
			<div id="data">
				<div class="content code" style="display:none;"><textarea id="code" readonly="readonly"></textarea></div>
				<div class="content folder" style="display:none;"></div>
				<div class="content image" style="display:none; position:relative;"><img src="" alt="" style="display:block; position:absolute; left:50%; top:50%; padding:0; max-height:90%; max-width:90%;" /></div>

				<div class="content path" style="display:none;"></div>
				<div class="content default">欢迎进入内容管理系统.</div>
			</div>
		</div>

		<script>
		$(function () {
			//实例化编辑器
    		var um = UM.getEditor('content');

			$(window).resize(function () {
				var h = Math.max($(window).height() - 0, 420);
				$('#container, #data, #tree').height(h).filter('.default').css('lineHeight', h + 'px');
			}).resize();

			$('#tree')
				.jstree({
					'core' : {
						'data' : {
							'url' : '/jstree-v3/content-manager/server.php?operation=get_node',
							'data' : function (node) {
								return { 'id' : node.id };
							}
						},
						'check_callback' : true,
						'themes' : {
							'responsive' : false,
							'variant' : 'small',
							'stripes' : true
						}
					},
					'contextmenu' : {
						'items' : function(node) {
							var tmp = $.jstree.defaults.contextmenu.items();
							delete tmp.create.action;
							tmp.create.label = "New";
							tmp.create.submenu = {
								"create_folder" : {
									"separator_after"	: true,
									"label"				: "目录",
									"action"			: function (data) {
										var inst = $.jstree.reference(data.reference),
											obj = inst.get_node(data.reference);
										inst.create_node(obj, { type : "default", text : "目录标题" }, "last", function (new_node) {
											setTimeout(function () { inst.edit(new_node); },0);
										});
									}
								},
								"create_file" : {
									"label"				: "文章",
									"action"			: function (data) {
										var inst = $.jstree.reference(data.reference),
											obj = inst.get_node(data.reference);
										inst.create_node(obj, { type : "article", text : "文章标题" }, "last", function (new_node) {
											setTimeout(function () { inst.edit(new_node); },0);
										});
									}
								}
							};
							if(this.get_type(node) === "article") {
								delete tmp.create;
							}
							return tmp;
						}
					},
					'types' : {
						'default' : { 'icon' : 'folder' },
						'article' : { 'valid_children' : [], 'icon' : 'file' }
					},
					'plugins' : ['state','dnd','types','contextmenu','wholerow','search']
				})
				.on('delete_node.jstree', function (e, data) {
					$.get('/jstree-v3/content-manager/server.php?operation=delete_node', { 'id' : data.node.id })
						.fail(function () {
							data.instance.refresh();
						});
				})
				.on('create_node.jstree', function (e, data) {
					$.get('/jstree-v3/content-manager/server.php?operation=create_node', { 'type' : data.node.type, 'id' : data.node.parent, 'position' : data.position, 'text' : data.node.text })
						.done(function (d) {
							data.instance.set_id(data.node, d.id);
						})
						.fail(function () {
							data.instance.refresh();
						});
				})
				.on('rename_node.jstree', function (e, data) {
					$.get('/jstree-v3/content-manager/server.php?operation=rename_node', { 'id' : data.node.id, 'text' : data.text })
						.fail(function () {
							data.instance.refresh();
						});
				})
				.on('move_node.jstree', function (e, data) {
					$.get('/jstree-v3/content-manager/server.php?operation=move_node', { 'id' : data.node.id, 'parent' : data.parent, 'position' : data.position })
						.fail(function () {
							data.instance.refresh();
						});
				})
				.on('copy_node.jstree', function (e, data) {
					$.get('/jstree-v3/content-manager/server.php?operation=copy_node', { 'id' : data.original.id, 'parent' : data.parent, 'position' : data.position })
						.always(function () {
							data.instance.refresh();
						});
				})
				.on('changed.jstree', function (e, data) {
					if(data && data.selected && data.selected.length) {
						$.get('/jstree-v3/content-manager/server.php?operation=get_content&id=' + data.selected.join(':'), function (d) {
							var datas = $.parseJSON(d);
							var dType = datas[0].type;

							var pathStr = '',content = [],contentStr='';
							if (datas[0].path != null){
								for(var i=0;i<datas[0].path.length;i++){
									var pathLink = '<a href="#" class="id-'+datas[0].path[i].id+'">'+datas[0].path[i].title+'</a>';
									pathStr += pathStr ? ' >> '+pathLink : pathLink;
								}
							}

							if (datas[0]['type']=='article'){
								var showContent = datas[0].content ? datas[0].content : '该文章没有内容,点击“编辑”添加文章！';

								content.push(
											'<div class="article">'+
											'	<h3>'+datas[0].title+'<button type="button" class="edit_article_btn">编辑</button></h3>'+
											'	<span style="font-weight:bold;">标签：</span><span class="tag">'+datas[0].tags.selectedJoins+'</span><hr>'+
											'	<span style="font-weight:bold;">摘要：</span><span class="summary">'+datas[0].summary+'</span><hr>'+
											'	<div class="content">'+showContent+'</div>'+
											'</div>'
											);
								$('#dialog-form #id').val(datas[0].id);

								var tagLeft = '', tagRight = '';
								for(var i=0;i<datas[0].tags.selected.length;i++){
									tagLeft += '<option value="'+datas[0].tags.selected[i].id+'">'+datas[0].tags.selected[i].name+'</option>';
								}
								for(var i=0;i<datas[0].tags.unselected.length;i++){
									tagRight += '<option value="'+datas[0].tags.unselected[i].id+'">'+datas[0].tags.unselected[i].name+'</option>';
								}
								$('#dialog-form #tagLeft').html(tagLeft);
								$('#dialog-form #tagRight').html(tagRight);

								$('#dialog-form #summary').val(datas[0].summary);
								$('#dialog-form #title').val(datas[0].title);
								um.setContent(datas[0].content);
							} else {
								var titleShow = datas[0].title;
								titleShow += datas[0].title_en ? '('+datas[0].title_en+')' : '';
								titleShow += '<button type="button" class="edit_titleEn_btn">编辑title_en</button>';
								content.push('<h3 class="list-title">'+titleShow+'</h3>');
								content.push('<ul class="article-lists">');
								var childLength = datas[0].children.length;
								for(var i=0;i<childLength;i++){
									content.push(
											'<li class="list id-'+datas[0].children[i].id+'">'+
											'	<a href="#">'+datas[0].children[i].title+'</a>'+
											'</li>'
											);
								}
								content.push('</ul>');

								$('#dialog-form-titleEn #id').val(datas[0].id);
								$('#dialog-form-titleEn #title').val(datas[0].title);
								$('#dialog-form-titleEn #title_en').val(datas[0].title_en);
							}

							$('#data .path').html(pathStr).show();
							contentStr = content.join('');
							$('#data .default').html(contentStr).show();
						});
					}
					else {
						$('#data .default').html('欢迎进入内容管理系统.').show();
					}
				});

			function showTreeTop(){
				if ($('#tree').length){
					$('#tree').prepend('<div class="top-search"><input type="text" name="searchTree" id="searchTree"><button type="button">显示ID</button></div>');
					var treeWidth = $('#tree').css('width');
					$('.top-search').css('width', treeWidth);
					$('#searchTree').css('width', parseInt(treeWidth)*0.8);
					clearInterval(intervalId);
				}
			}
			var intervalId = setInterval(showTreeTop, 1000);

			var to = false;
		    $(document).on('keyup', '#searchTree', function(){
		    	if (to){
		    		clearTimeout(to);
		    	}
		    	to = setTimeout(function () {
		     		var v = $('#searchTree').val();
			      	$('#tree').jstree(true).search(v);
			    }, 250);
		    });

			var showId = 0;
			$(document).on('click', '.top-search button', function(){
		    	if (showId == 1){
		    		$('.showid').remove();
					showId = 0;
					return false;
		    	}
				$('li').each(function(){
					var liId = $(this).attr('id');
					$(this).find('a').first().append("<i class='showid'>("+liId+")</i>");
					showId = 1;
				});
			});

			//dialog form
			$("#dialog-form").dialog({
				autoOpen: false,
				height: 580,
				width: 750,
				modal: true,
				buttons: {
					"更新": function() {
						var id = $("#dialog-form #id").val();
						var summary = $("#dialog-form #summary").val();
						var content = um.getContent();
						if (!id || !content){
							alert('参数不能为空');
							return false;
						}

						var tids = '', tnames = '';
						$('#tagLeft option').each(function(){
							var tid = $(this).val();
							var tname = $(this).text();
							tids += tids ? '|'+ tid : tid;
							tnames += tnames ? ', '+ tname : tname;
						});
						$.post('/jstree-v3/content-manager/server.php?operation=set_node', {'id':id,'tids':tids,'summary':summary,'content':content})
							.done(function (d) {
								//alert(d.resMsg);
								if (d.resCode == 0){
									$('.article .tag').html(tnames);
									$('.article .summary').html(summary);
									$('.article .content').html(content);
									$("#dialog-form").dialog( "close" );
								}
								return false;
							});
					},
					"取消": function() {
						$( this ).dialog( "close" );
					}
				},
				close: function() {}
			});
			//dialog form
			$("#dialog-form-titleEn").dialog({
				autoOpen: false,
				height: 350,
				width: 400,
				modal: true,
				buttons: {
					"更新": function() {
						var id = $("#dialog-form-titleEn #id").val();
						var title = $("#dialog-form-titleEn #title").val();
						var title_en = $("#dialog-form-titleEn #title_en").val();
						if (!id){
							alert('参数不能为空');
							return false;
						}

						$.post('/jstree-v3/content-manager/server.php?operation=set_node', {'id':id,'title_en':title_en})
							.done(function (d) {
								//alert(d.resMsg);
								if (d.resCode == 0){
									var titleShow = title;
									titleShow += title_en ? '('+title_en+')' : '';
									titleShow += '<button type="button" class="edit_titleEn_btn">编辑title_en</button>';
									$('.content h3.list-title').html(titleShow);
									$("#dialog-form-titleEn").dialog( "close" );
								}
								return false;
							});
					},
					"取消": function() {
						$( this ).dialog( "close" );
					}
				},
				close: function() {}
			});

			$(document).on('click', '.edit_article_btn', function() {
				$( "#dialog-form" ).dialog( "open" );
			});
			$(document).on('click', '.edit_titleEn_btn', function() {
				$( "#dialog-form-titleEn" ).dialog( "open" );
			});
			$(document).on('click', '.article-lists li a', function() {
				var aClass = $(this).closest('li').attr('class');
				var res = aClass.match(/id-\d+/gi);
				if (!res[0]){
					return false;
				}
				var ret = res[0].split('-');
				var nid = ret[1];
				$('#tree li#'+nid+'>a').click();
			});
			$(document).on('click', '#data .path a', function() {
				var aClass = $(this).attr('class');
				var res = aClass.match(/id-\d+/gi);
				if (!res[0]){
					return false;
				}
				var ret = res[0].split('-');
				var nid = ret[1];
				$('#tree li#'+nid+'>a').click();
			});

			$('.tagOpt-btn').on('click', function(){
				var btnTxt = $(this).text();
				if (btnTxt == '显示标签栏'){
					$(this).text('隐藏标签栏');
				} else {
					$(this).text('显示标签栏');
				}
				$('.tagSelects').toggle();
			});

		});

		function tagToLeft(){
			var nodes=$("#tagRight option:selected");
			$("#tagLeft").append(nodes);
		}

		function tagToRight(){
			var nodes=$("#tagLeft option:selected");
			$("#tagRight").append(nodes);
		}
		</script>
	</body>
</html>