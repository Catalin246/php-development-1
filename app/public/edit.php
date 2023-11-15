<?php

require_once("dbconfig.php");

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

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

        <?php

        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);

            $sql = "SELECT * FROM posts WHERE id = :id";

            try {
                $stmt = $connection->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();

                $post = $stmt->fetch(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control text-start" id="id" name="id" value="<?php
                echo isset($post['id']) ? htmlspecialchars($post['id']) : '';
                ?>" />
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control text-start" id="name" name="name" value="<?php
                echo isset($post['name']) ? htmlspecialchars($post['name']) : '';
                ?>" required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control text-start" id="email" name="email" value="<?php
                echo isset($post['email']) ? htmlspecialchars($post['email']) : '';
                ?>" required />
            </div>
            <div class="form-group">
                <label for="ip_address">IP address</label>
                <input type="text" class="form-control text-start" id="ip_address" name="ip_address" value="<?php
                echo isset($post['ip_address']) ? htmlspecialchars($post['ip_address']) : '';
                ?>" required />
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control"
                    name="message"><?php echo isset($post['message']) ? htmlspecialchars($post['message']) : ''; ?></textarea>
            </div>
            <a href="/"><button type="submit" class="btn btn-primary my-4">Edit Post</button></a>
        </form>
    </div>

    <div class="container">

        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);
            $ip_address = htmlspecialchars($_POST['ip_address']);

            $datetime = new DateTime();

            $dateTimeString = $datetime->format('Y-m-d H:i:s');

            if ($id === false) {
                echo "Invalid ID.";
                exit();
            }

            $sql = "UPDATE posts SET name = :name, email = :email, message = :message, posted_at = :posted_at, ip_address = :ip_address WHERE id = :id";

            try {
                $stmt = $connection->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':message', $message, PDO::PARAM_STR);
                $stmt->bindParam(':posted_at', $dateTimeString, PDO::PARAM_STR);
                $stmt->bindParam(':ip_address', $ip_address, PDO::PARAM_STR);

                $stmt->execute();

                echo '<script>window.location.replace("index.php");</script>';
                exit();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        ?>

    </div>

</body>

</html>