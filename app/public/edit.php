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
        <h1>Edit the post with id:
            <?php

            if (isset($_GET['id'])) {
                echo htmlspecialchars($_GET['id']);
            }

            ?>

        </h1>

        <form action="" method="POST">
            <!-- <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message"></textarea>
            </div> -->
            <a href="/"><button type="submit" class="btn btn-primary my-4">Edit Post</button></a>
        </form>
    </div>

    <div class="container">

        <?php

        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);

            //$sql = "DELETE FROM posts WHERE id = :id";
        
            // try {
            //     $stm = $connection->prepare($sql);
            //     $stm->bindParam(':id', $id, PDO::PARAM_INT);
        
            //     if ($stm->execute()) {
            //         header('Location: index.php');
            //         exit();
            //     } else {
            //         echo "Something went wrong when you try to delete the post...";
            //     }
            // } catch (PDOException $e) {
            //     echo "Error: " . $e->getMessage();
            // }
        } else {
            echo "Invalid ID!";
        }

        ?>

    </div>

</body>

</html>