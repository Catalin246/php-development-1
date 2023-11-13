<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $fileName = $_FILES["file"]["name"];
    $fileTmp = $_FILES["file"]["tmp_name"];

    $uploadDir = "uploads/";

    $filePath = $uploadDir . $fileName;

    if (file_exists($filePath)) {
        echo "Sorry, file already exists.";
    } elseif (move_uploaded_file($fileTmp, $filePath)) {
        echo "File uploaded successfully!";
        echo "<br>Name: $name";
        echo "<br>File Name: $fileName";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>

<div class="container">
    <h1>Files in Uploads Folder</h1>

    <?php

    $uploadDir = "uploads/";

    $files = scandir($uploadDir);

    $files = array_diff($files, array('.', '..'));

    foreach ($files as $file) {
        echo "<p><a href='$uploadDir$file' download>$file</a></p>";
    }

    ?>
</div>