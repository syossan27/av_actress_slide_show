<html>
	<head>
		<meta charset="UTF-8">
		<!-- jQuery library (served from Google) -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<!-- bxSlider Javascript file -->
		<script src="/js/jquery.bxslider.min.js"></script>
		<!-- bxSlider CSS file -->
		<link href="/css/jquery.bxslider.css" rel="stylesheet" />
	</head>
	<body>
		<ul class="bxslider">
		@foreach ($img_urls as $img_url)	
		  <li><img src={{$img_url}} /></li>
		@endforeach
		</ul>
	</body>
</html>
