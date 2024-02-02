<link rel="stylesheet" href="form.css" media="all">
<link rel="stylesheet" href="index.css" media="all">
<?php 
$targetDirectory = "uploads/";
$targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]); 
$uploadOk = 1; 
 
 

if (file_exists($targetFile)) { 
  echo "Sorry, file already exists."; 
  $uploadOk = 0; 
} 

if ($_FILES["fileToUpload"]["size"] > 50000000) { 
  echo "Sorry, your file is too large."; 
  $uploadOk = 0; 
} 
 
$allowedFormats = array("jpg", "jpeg", "png", "gif", "webp", "pdf", "docx", "pptx", "xlsx", "xls", "ppt", "accdb"); 
$fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); 
if (!in_array($fileExtension, $allowedFormats)) { 
  echo "Sorry, only JPG, JPEG, PNG, WEBP, GIF, PDF, DOCX, PPTX, XLSX, XLS, PPT  ACCDB files are allowed."; 
  $uploadOk = 0; 
} 
 
if ($uploadOk == 0) { 
  echo "Sorry, your file was not uploaded."; 
} else { 
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) { 
   
    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded."; 
    $files = glob("test_uploads/*.*");
    for ($i=0; $i<count($files); $i++)
    {
    $num = $files[$i];
    $check = getimagesize($files[$i]); 
    if ($check !== false) { 
      echo '<a href="'.$num.'"><img src="'.$num.'"></a>'."<p>";}
    else
     { echo '<a href="'.$num.'">"'.trim($num, "test_uploads/").'"</a>'."<p>";}
    }
    echo '<a href="form.html">go back';
  }
  } 
