<?php
if(isset($_FILES['file'])){
    $file = $_FILES['file'];
    $mimetype = $file['type'];

    $allowed_types = array("image/jpg","image/jpeg","image/png");
    if(!in_array($mimetype, $allowed_types)){
        header('Location: index.php');
    }

    if(!is_dir("uploads")){
        mkdir("uploads", 0777);
    }

    $filename = generateRandomFilename($file['name']);
    move_uploaded_file($file['tmp_name'], 'uploads/'.$filename);
} else {
    header("Location: index.php");
}

function generateRandomFilename($originalName) {
    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
    $randomString = bin2hex(random_bytes(8)); // Generates a random string

    return $randomString . '.' . $extension;
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
    <title>SUBIDO</title>
</head>
<body>
<div class="container">
    <div class="upload-container"></div>
        <div class="img-area" data-img="">
        <img src="uploads/<?=$filename?>">
    </div>
    <a style="text-align: center;" class="upload-image" href="index.html">Subir mas</a>
    <button id="compartirBtn" class="upload-image">Compartir URL</button>
	<script >
    var Compartir =  document.getElementById("compartirBtn").addEventListener("click", function() {
    // Obtener la URL actual
    var url = window.location.href;

    // Copiar la URL al portapapeles
    navigator.clipboard.writeText(url).then(function() {
        alert("URL copiada al portapapeles: " + url);
    }).catch(function(error) {
        console.error("Error al copiar la URL: ", error);
    });
});

    </script>
</body>
</html>
