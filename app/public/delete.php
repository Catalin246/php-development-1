<?php

require_once("dbconfig.php");

$connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    $sql = "DELETE FROM posts WHERE id = :id";

    try {
        $stm = $connection->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stm->execute()) {
            header('Location: index.php');
            exit();
        } else {
            echo "Something went wrong when you try to delete the post...";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid ID!";
}

$connection = null;

?>