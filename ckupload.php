<?php
$url = '';
 /*extensive suitability check before doing anything with the file...*/
    $allowed_ext = array('jpg', 'jpeg', 'gif', 'png');
	$fileParts  = pathinfo($_FILES['upload']['name']);
	$file_type = strtolower($fileParts['extension']);
	if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
    {
       $message = "No file uploaded.";
    }
    else if ($_FILES['upload']["size"] == 0)
    {
       $message = "The file is of zero length.";
    }
	elseif(!in_array($file_type,$allowed_ext)){
		$message = "This filetype is not allowed. Please upload one of the following: .jpg, .jpeg, .gif, .png";
		/*else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg"))
		{
		   $message = $file_type."The image must be in JPG format. Please upload a JPG or PNG instead.";
		}*/
    }
	else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
    {
       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
    }
    else {
      $message = "";
	  $url = 'uploads/ckeditorImg/uploads'.time()."_".$_FILES['upload']['name'];
      $move = @move_uploaded_file($_FILES['upload']['tmp_name'], $url);
      if(!$move)
      {
         $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
      }
      $url = '../'.$url;
    }
 
$funcNum = $_GET['CKEditorFuncNum'] ;
echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
?>
