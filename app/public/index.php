<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Development</title>
</head>

<body>
    <form action="" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="Catalin"><br>
        <label for="birthdate">Birthdate:</label><br>
        <input type="date" id="birthdate" name="birthdate" value="2002-01-28"><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php

    if (isset($_POST['name']) && isset($_POST['birthdate'])) {
        $name = $_POST['name'];
        $birthdate = date('Y/m/d', strtotime($_POST['birthdate']));

        echo "<h1>User Information</h1>";
        echo "<p>Name: $name</p>";
        echo "<p>Birthdate: $birthdate</p>";
    } else {
        echo "<h1>Error</h1>";
        echo "<p>Both name and birthdate parameters are required.</p>";
    }

    ?>
</body>

</html>