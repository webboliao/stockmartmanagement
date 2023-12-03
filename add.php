<?php
include "dbcont.php";

// Process the form data

$PRODUCT_CODE = mysqli_real_escape_string($conn, $_POST['product_code']);
$PRODUCT_BRAND = mysqli_real_escape_string($conn, $_POST['product_brand']);
$PRODUCT_NAME = mysqli_real_escape_string($conn, $_POST['product_name']);
$QUANTITY = mysqli_real_escape_string($conn, $_POST['quantity']);
$SUPPLIER = mysqli_real_escape_string($conn, $_POST['supplier']);
$PRICE = mysqli_real_escape_string($conn, $_POST['price']);
$PURCHASED = mysqli_real_escape_string($conn, $_POST['pdate']);
$END = mysqli_real_escape_string($conn, $_POST['edate']);

// Perform CRUD operations

$sql = "INSERT INTO product (product_code, product_brand, product_name, quantity, supplier, pdate, edate, price) VALUES ('$PRODUCT_CODE', '$PRODUCT_BRAND', '$PRODUCT_NAME', '$QUANTITY', '$SUPPLIER', '$PURCHASED', '$END', '$PRICE')";

if ($conn->query($sql) === TRUE) {
    // Check if stock is below 10 and display a warning
    if ($QUANTITY < 10) {
        echo '<script>alert("Low stock! Quantity is below 10."); window.location.href="homepage.php";</script>';
    }
    echo '<script>alert("Stock record updated successfully"); window.location.href="homepage.php";</script>';
} else {
    echo "Error updating stock record: " . $conn->error;
}

$conn->close();
?>