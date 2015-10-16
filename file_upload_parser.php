<?php
include("functions/functions.php");
$ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg";
$dir = 'files/';
$uploadedFiles = array();
$filesSize = sizeof($_FILES['file1']['name']);
if($filesSize>10) {
	echo "ERROR: Can't upload more than 10 files.";
	exit();
} else {
	foreach ( $_FILES['file1']['name'] as $i => $name ) {
		$time = rand(0,time());
		$fileName = $_FILES['file1']['name'][$i];
		$fileTmpLoc = $_FILES['file1']['tmp_name'][$i];
		$fileType = $_FILES['file1']['type'][$i];
		$fileExt = end(explode('.', $fileName));
		$fileBasename = str_replace('.'.$fileExt, '', $fileName);
		$fileUploadedName = $time.'.'.$fileExt;
		$fileOrgLoc = $dir.$fileUploadedName;
		$video_attributes = _get_video_attributes($fileTmpLoc, $ffmpeg);
		$video_height = $video_attributes['height'];
		if(!$fileTmpLoc) {
			echo "ERROR: Please browse for a file before clicking the upload button.";
			exit();
		}
		if(move_uploaded_file($fileTmpLoc, $fileOrgLoc)) { ?>
			<input type="button" onclick="encodeFile('<?php echo $time; ?>', '<?php echo $fileExt; ?>', '<?php echo $video_height; ?>');" value="Encode <?php echo $fileName; ?>" /><?php
		} else {
			echo "move_upload_file function failed.";
		}
	}
}
 ?>
