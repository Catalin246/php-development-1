<?php require("script.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Setting the pages character encoding -->
    <meta charset="UTF-8">

    <!-- The meta viewport will scale my content to any device width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link to my stylesheet -->
    <link rel="stylesheet" href="styles.css">
    <?php
    if ($username_error != null) {
        ?>
        <style>
            .username-error {
                display: block
            }
        </style>
        <?php
    }
    if ($password_error != null) {
        ?>
        <style>
            .password-error {
                display: block
            }
        </style>
        <?php
    }
    if ($success != null) {
        ?>
        <style>
            .success {
                display: block
            }
        </style>
        <?php
    }
    ?>

    <title>Displaying errors with PHP</title>
</head>

<body>
    <div class="page">

        <!-- <h1>Displaying form errors with PHP</h1> -->

        <form action="" method="post" autocomplete="off">

            <label>Username <span>Choose a username</span> </label>
            <input type="text" name="username" value="<?php echo $username; ?>">
            <p class="error username-error">
                <?php echo $username_error; ?>
            </p>

            <label>Password <span>Choose a password</span> </label>
            <input type="text" name="password" value="<?php echo $password; ?>">
            <p class="error password-error">
                <?php echo $password_error; ?>
            </p>

            <input type="submit" name="sign-up" value="Sign Up">
            <p class="success">
                <?php echo $success; ?>
            </p>
        </form>

    </div>
</body>

</html>