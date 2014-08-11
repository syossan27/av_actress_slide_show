<html>
	<head>
		<meta charset="UTF-8">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="/js/jquery.bxslider.min.js"></script>
		<link href="/css/jquery.bxslider.css" rel="stylesheet" />
		<script type="text/javascript">
			$(document).ready(function(){
				$('.bxslider').bxSlider();
			});
		</script>
	</head>
	<body>
		<ul class="bxslider">
		@foreach ($img_urls as $img_url)	
		  <li><img src={{$img_url}} /></li>
		@endforeach
		</ul>
	</body>
</html>
