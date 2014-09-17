<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<title>{{ get_title(false) }}</title>

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
		<div class="container">{{ content() }}</div>
		<div class="site-footer"></div>

		<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
		<script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/js/bootstrap.js"></script>

		<script src="/js/tl.js"></script>
	</body>
</html>