<?php
include 'dbcont.php';

if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $PRODUCT_CODE = $_POST['product_code'];
    $PRODUCT_BRAND = $_POST['product_brand'];
    $PRODUCT_NAME = $_POST['product_name'];
	$QUANTITY = $_POST['quantity'];
    $SUPPLIER = $_POST['supplier'];
    $PRICE = $_POST['price'];
    $PURCHASE = $_POST['pdate'];
    $EXPIRE = $_POST['edate'];

    // Corrected table name to match your previous code
    mysqli_query($conn, "UPDATE product SET product_code='$PRODUCT_ID',product_brand='$PRODUCT_BRAND', product_name='$PRODUCT_NAME', quantity='$QUANTITY',supplier='$SUPPLIER',price='$PRICE',pdate='$PURCHASED',edate='$END' WHERE id = '$ID'");
    header("location: homepage.php");
}
?>