<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['postalcode']) && isset($_POST['language']) && isset($_POST['options']) && is_array($_POST['options'])) {
        // Save the post valus in variables
        $name = $_POST['name'];
        $postal_code = $_POST['postalcode'];
        $language = $_POST['language'];

        // Validate if the postal code is filled in
        if (empty($postal_code)) {
            $errors['postal_code'] = 'Postal code is required.';
        } else {
            // Validate the format of the postal code
            if (!preg_match('/^\d{4} [a-zA-Z]{2}$/', $postal_code)) {
                $errors['postal_code'] = 'Invalid postal code format. It should be 4 numbers, a space, and 2 letters.';
            }
        }

        if (empty($errors)) {
            // Display the form data
            echo '<div class="container">';
            echo "<h1>Form Results</h1>";
            echo "<p>Name: $name</p>";
            echo "<p>Post Code: $postal_code</p>";
            echo "<p>Language: $language</p>";
            echo "<p>Extra option: ";
            foreach ($_POST['options'] as $option) {
                echo $option . ", ";
            }
            echo "</p>";
            if (isset($_POST['remarks'])) {
                // Use nl2br to convert newlines to <br> tags
                $remarks = nl2br($_POST['remarks']);

                echo "<p>Remarks: ";
                echo "$remarks</p>";
            }
            echo '</div>';
        }
    }
}
