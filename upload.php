<?php
if(isset($_FILES['file'])){
    $file = $_FILES['file'];
    $filename = $file['name'];
    $mimetype = $file['type'];



    $allowed_types = array("image/jpg","image/jpeg","image/png");
    if(!in_array($mimetype,$allowed_types)){
        header('Location:index.php');
    }

    if(!is_dir("uploads")){
        mkdir("uploads",0777);
    }

    move_uploaded_file($file['tmp_name'],'uploads/'.$filename);
} else {
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style/styyle.css">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/4007/4007710.png">
	<title>Upload Img</title>
</head>
<body>
<div class="container" >
    <div class="upload-container"></div>
        <div class="img-area" data-img="">
        <img src="uploads/<?=$filename?>">
	</div>
    <a style="text-align: center;" class="upload-image" href="index.html">Subir mas</a>
</body>
</html>
