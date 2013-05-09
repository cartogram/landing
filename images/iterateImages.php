<?php
$directory = dirname(__FILE__);
$filenames = array();
$iterator = new DirectoryIterator($directory);
$numberOfImages = 0;
$images = array();
foreach($iterator as $picture) {
	$filename = $picture->getFilename();
	$ending = substr($filename, strlen($filename)-3 , 3);
	$ending2 = substr($filename, strlen($filename)-4 , 4);
	$numberOfImages++;
	if ($ending=="JPG" || $ending == "jpg" || $ending=="jpeg") {
		array_push($images, $filename);
	}
}

?>
<html>
	<head>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			var index = 0;
		    var images = <?php echo json_encode($images); ?>;

			var total = images.length;
		    $(document).ready(function() {		    	
		    	$("img").attr("src", images[index]);
		    });
		    $(document).click(function(e) { 
		    // Check for left button
		    if (e.button == 0) {
		        index++;
		        if (index == total) {
		        	index = 0;
		        }
		        $("img").attr("src", images[index]);
		    }
		});

		</script>
	</head>
	<body>
		<img src="">
	</body>
</html>