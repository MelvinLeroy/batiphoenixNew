<?php
	function form_add_media(){
		$str = "
		<form action='action/uploadImg.php' method='post' enctype='multipart/form-data'>
			 Select image to upload:
	    	<input type='file' name='fileToUpload' id='fileToUpload'>
	    	<input type='submit' value='Upload Image' name='submit'>
		</form>";
		echo $str;
	}
	
?>