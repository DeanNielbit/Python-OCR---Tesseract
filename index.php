<form action="" method="post" enctype="multipart/form-data">
   Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>


<?php 
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".<br /><br />";
    $uploadOk = 1;
  } else {
    echo "File is not an image.<br /><br />";
    $uploadOk = 0;
  }
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br /><br />";
  // if everything is ok, try to upload file
  } else {
    $temp = explode(".", $_FILES["fileToUpload"]["name"]);
    $newfilename = $target_dir.''.round(microtime(true)) . '.' . end($temp);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfilename)) {

      /*show output*/
      echo '<h2>OUTPUT TEXT</h2><br />';
      $command = system('python3 main.py '.$newfilename.' '.rand().'.txt');
      @$output = shell_exec($command);
      echo ''.$output.'<br /><br />';

      /*show original*/
      echo '<h2>INPUT IMAGE</h2><br />';      
      echo '<img src="'.$newfilename.'" width="50%"><br /><br />';

    }
  }


?>
