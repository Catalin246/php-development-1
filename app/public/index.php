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

            <?php if (!isset($errors['postal_code'])): ?>
                <p style="color: red;">
                    <?= $errors['postal_code'] ?>
                </p>
            <?php endif; ?>

            <br><br>
            <label>Preferred language:</label><br>
            <select name="language"><br>
                <option value="EN">English</option>
                <option value="NL">Dutch</option>
                <option value="DE">German</option>
                <option value="FR">French</option>
            </select><br><br>
            <label>Extra options:</label><br>
            <input type="checkbox" name="options" value="Vegetarian"> Vegetarian<br>
            <input type="checkbox" name="options" value="Gluten free"> Gluten free<br>
            <input type="checkbox" name="options" value="Lactose free"> Lactose
            free<br><br>
            <label>Remarks:</label><br>
            <textarea name="remarks" id="" cols="30" rows="10"></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>

    <div class="container">
        <?php

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name']) && isset($_POST['postalcode']) && isset($_POST['language'])) {
                // Save the post valus in variables
                $name = $_POST['name'];
                $postal_code = $_POST['postalcode'];
                $language = $_POST['language'];

                // Validate if the postal code is filled in
                if (empty($postalCode)) {
                    $errors['postal_code'] = 'Postal code is required.';
                } else {
                    // Validate the format of the postal code
                    if (!preg_match('/^\d{4} [a-zA-Z]{2}$/', $postalCode)) {
                        $errors['postal_code'] = 'Invalid postal code format. It should be 4 numbers, a space, and 2 letters.';
                    }
                }

                if (empty($errors)) {
                    // Display the form data
                    echo "<h1>Form Results</h1>";
                    echo "<p>Name: $name</p>";
                    echo "<p>Post Code: $postal_code</p>";
                    echo "<p>Language: $language</p>";
                }
            }
        }

        ?>
    </div>
</body>

</html>