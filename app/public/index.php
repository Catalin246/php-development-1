<?php

require_once("dbconfig.php");

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <a href="/">Home</a>
        <a href="/add.php">Add Post</a>
    </div>

    <div class="container">
        <h1 class="pt-5">Guestbook</h1>
        <?php

        $sql = "SELECT * FROM posts";
        $result = $connection->query($sql);

        foreach ($result as $row) {
            echo '<div class="card mb-3">';
            echo '  <div class="card-header">' . $row["name"] . '</div>';
            echo '  <div class="card-body">';
            echo '    <p class="card-text"><strong>ID:</strong> ' . $row["id"] . '</p>';
            echo '    <p class="card-text"><strong>Message:</strong> ' . $row["message"] . '</p>';
            echo '    <p class="card-text"><strong>IP Address:</strong> ' . $row["ip_address"] . '</p>';
            echo '    <p class="card-text"><strong>Posted At:</strong> ' . $row["posted_at"] . '</p>';
            echo '    <a href="delete.php?id=' . $row["id"] . '" class="btn btn-danger">Delete</a>';
            echo '    <a href="edit.php?id=' . $row["id"] . '" class="btn btn-primary">Edit</a>';
            echo '  </div>';
            echo '</div>';
        }


        ?>
    </div>
</body>

</html>