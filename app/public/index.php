<?php require("script.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Development</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="pt-5">Assignment Form</h1>
        <form method="POST">
            <label>Full name:</label><br>
            <input type="text" name="name" placeholder="Full name"><br><br>
            <label>Postal code:</label><br>
            <input type="text" name="postalcode" placeholder="Postal code">
            <p style="color:red">
                <?php
                if (isset($errors['postal_code']))
                    echo $errors['postal_code'];
                ?>
            </p>
            <label>Preferred language:</label><br>
            <select name="language"><br>
                <option value="EN">English</option>
                <option value="NL">Dutch</option>
                <option value="DE">German</option>
                <option value="FR">French</option>
            </select><br><br>
            <label>Extra options:</label><br>
            <input type="checkbox" name="options[]" value="Vegetarian"> Vegetarian<br>
            <input type="checkbox" name="options[]" value="Gluten free"> Gluten free<br>
            <input type="checkbox" name="options[]" value="Lactose free"> Lactose
            free<br><br>
            <label>Remarks:</label><br>
            <textarea name="remarks" id="" cols="30" rows="10"></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>