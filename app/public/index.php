<?php

// Calculate age based on birthdate
function calculateAge($birthdate) {
    $today = new DateTime();
    $birthdate = new DateTime($birthdate);
    $age = $today->diff($birthdate);
    return $age->y;
}

// Retrive name and birth date from URL
// URL structure: localhost?name=Catalin&birthdate=2002-01-28

if (isset($_GET['name']) && isset($_GET['birthdate'])) {
    $name = htmlspecialchars($_GET['name']);
    $birthdate = htmlspecialchars($_GET['birthdate']);

    $age = calculateAge($birthdate);

    echo "<h1>User Information</h1>";
    echo "<p>Name: $name</p>";
    echo "<p>Age: $age years</p>";
} else {
    echo "<h1>Error</h1>";
    echo "<p>Both name and birthdate parameters are required.</p>";
}