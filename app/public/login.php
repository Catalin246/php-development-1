<?php

require_once("dbconfig.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = "admin";
    $password = "admin";

    if ($_POST["name"] == $username && $_POST["password"] == $password) {
        $_SESSION["authenticated"] = true;
        header("Location: management.php");
        exit();
    } else {
        $error_message = "Invalid username or password";
    }
}

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        <h1>Login Form</h1>

        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" id="name" name="name" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <a href="/"><button type="submit" class="btn btn-primary my-4">Login</button></a>
        </form>
    </div>

    <div class="container">

        <?php

        // if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //     $name = htmlspecialchars($_POST["name"]);
        //     $message = htmlspecialchars($_POST["message"]);
        //     $email = htmlspecialchars($_POST["email"]);
        

        //     try {
        //         require_once("dbconfig.php");
        
        //         $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        //         $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //         $sql = "INSERT INTO posts (name, message, ip_address, posted_at, email) VALUES (:name, :message, 123456789, now(), :email)";
        
        //         $stmt = $connection->prepare($sql);
        //         $stmt->bindParam(':name', $name);
        //         $stmt->bindParam(':message', $message);
        //         $stmt->bindParam(':email', $email);
        //         $stmt->execute();
        
        //     } catch (PDOException $e) {
        //         echo "Error: " . $e->getMessage();
        //     }
        
        //     $connection = null;
        //}
        
        ?>

    </div>

</body>

</html>