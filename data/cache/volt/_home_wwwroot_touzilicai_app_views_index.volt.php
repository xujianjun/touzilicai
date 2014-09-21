<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<title><?php echo $this->tag->getTitle(false); ?></title>

		<!-- 最新 Bootstrap 核心 CSS 文件 -->
		<link rel="stylesheet" href="/css/bts-tl.css">
		<link rel="stylesheet" href="/css/tl.css">
		<link rel="stylesheet" href="/css/nivo-slider.css">

		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="/js/jquery/jquery-1.10.2.min.js"></script>
		<script src="/js/jquery/jquery.tagcloud.js"></script>
		<script src="/js/jquery/jquery.nivo.slider.js"></script>
		<script src="/js/jquery/jquery.tl.js"></script>
	</head>
	<body>
		<div class="site-masthead"></div>
		<div class="container"><?php echo $this->getContent(); ?></div>
		<div class="site-footer"></div>

		<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
		<script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/js/bootstrap.js"></script>

		<script src="/js/tl.js"></script>
		<?php if ($bdtongji) { ?>
		<script type="text/javascript">
		var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
		document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F2f07e665934361372c1544e1591700ac' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<?php } ?>
	</body>
</html>
