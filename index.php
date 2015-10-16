<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
progress {
	width: 325px;
	height: 30px;
	margin-top: 20px;
	display: block;
	/* Important Thing */
	-webkit-appearance: none;
	border: 1px solid #7DB4CC;
}

/* All good till now. Now we'll style the background */
progress::-webkit-progress-bar {
	background-image:url("stripe_8dc5046467c722ed1f2fcafe99f9e87e.png");
	padding: 0px;
}

/* Now the value part */
progress::-webkit-progress-value {
	background: rgba(125, 180, 204, 0.65);
	/* Looks great, now animating it */
}

/* That's it! Now let's try creating a new stripe pattern and animate it using animation and keyframes properties  */


</style>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

<script>
function _(e1) {
	return document.getElementById(e1);
}
function uploadFile() {
	var ajaxData = new FormData();
	ajaxData.append( 'action','upload_form');
	$.each($("#file1"), function(i, obj) {
		$.each(obj.files,function(i,file){
			ajaxData.append('file1['+i+']', file);
		})
	});
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "file_upload_parser");
	ajax.send(ajaxData);			
}
function progressHandler(event) {
	//_("loded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100; 
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event) {
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = Math.round(percent);
	
}
function errorHandler(event) {
	_("status").innerHTML = "Uploded Failed";
}
function abortHandler(event) {
	_("status").innerHTML = "Uploded Aborted";
}
function encodeFile(fileBaseName, fileExt, fileHeight) {
	if(fileHeight>=1080) {
		$.ajax({
			url: 'encoder_1080', // point to server-side PHP script 
			cache: false,
			data: 'fileBaseName='+fileBaseName+'&fileExt='+fileExt,                         
			type: 'post',
			success: function(response){
				//alert(response); // display response from the PHP script, if any
			}
		});
	}
	if(fileHeight>=720) {
		$.ajax({
			url: 'encoder_720', // point to server-side PHP script 
			cache: false,
			data: 'fileBaseName='+fileBaseName+'&fileExt='+fileExt,                         
			type: 'post',
			success: function(response){
				//alert(response); // display response from the PHP script, if any
			}
		});
	}
	if(fileHeight>=480) {
		$.ajax({
			url: 'encoder_480', // point to server-side PHP script 
			cache: false,
			data: 'fileBaseName='+fileBaseName+'&fileExt='+fileExt,                         
			type: 'post',
			success: function(response){
				//alert(response); // display response from the PHP script, if any
			}
		});
	}
	if(fileHeight>=360) {
		$.ajax({
			url: 'encoder_360', // point to server-side PHP script 
			cache: false,
			data: 'fileBaseName='+fileBaseName+'&fileExt='+fileExt,                         
			type: 'post',
			success: function(response){
				//alert(response); // display response from the PHP script, if any
			}
		});
	}
	if(fileHeight>=240) {
		$.ajax({
			url: 'encoder_240', // point to server-side PHP script 
			cache: false,
			data: 'fileBaseName='+fileBaseName+'&fileExt='+fileExt,                         
			type: 'post',
			success: function(response){
				//alert(response); // display response from the PHP script, if any
			}
		});
	}
}
</script>
</head>

<body>

<form name='upload_form' id="upload_form" action="" method="post" enctype="multipart/form-data">
	<input type="file" name="file1" id="file1" multiple="multiple" maxlength="10">
	<input type="button" name="submit" value="Upload File" onclick="return uploadFile();">
    <progress id="progressBar" value="0" max="100"></progress>
    <p id="status"></p>
    <p id="loded_n_total"></p>
</form>
</body>
</html>
