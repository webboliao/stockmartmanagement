<?php
include 'dbcont.php';

// Check if the form data (product_code) was sent via POST method
if(isset($_POST['product_code'])) {
    // Sanitize and retrieve the product CODE
    $product_id = mysqli_real_escape_string($conn, $_POST['product_code']);

    // Prepare and execute the DELETE query using prepared statements
    $stmt = $conn->prepare("DELETE FROM stock WHERE product_id = ?");
    $stmt->bind_param("s", $product_code);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>alert("Deleted data successfully.");</script>';
    } else {
        echo '<script>alert("Error deleting data.");</script>';
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect to index.php after deletion
    echo '<script>window.location.href = "homepage.php";</script>';
} else {
    // Handle if product_id is not set in POST data
    echo '<script>alert("Product CODE not provided.");</script>';
    echo '<script>window.location.href = "homepage.php";</script>';
}
?>