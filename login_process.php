<?php
session_start();

// Function to validate user credentials
function validateUser($username, $password) {
    // In a real-world scenario, you would retrieve this data from a database
    $authorizedUsers = [
        'NABIHA' => 'password1',
        'ATIEFFA' => 'password2',
		'FATIHAH' => 'password3',
        // Add more users as needed
    ];

    // Check if the provided username exists and the password is correct
    return isset($authorizedUsers[$username]) && $authorizedUsers[$username] === $password;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user input
    if (empty($username) || empty($password)) {
        echo "Please enter both username and password.";
        exit();
    }

    // Validate user credentials
    if (validateUser($username, $password)) {
        // Set session variables
        $_SESSION['username'] = $username;

        // Redirect to the homepage of the stock management system
        header('Location: homepage.php');
        exit();
    } else {
        echo "Invalid username or password. Please try again.";
    }
}
?>
