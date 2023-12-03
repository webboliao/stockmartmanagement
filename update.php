<?php
include 'dbcont.php';
$ID = $_GET['id'];
$Record = mysqli_query($conn,"SELECT * FROM product WHERE id = $ID");
$data = mysqli_fetch_array($Record);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
    <style>
        /* Form styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: burlywood;
            padding: 30px;
            width: 50%;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="updateDb.php" method="POST">
        <h2>Update Product</h2>
    
      
        <div>
            <label for="code">PRODUCT CODE:</label>
            <input type="text" name="product_code" value="<?php echo $data['product_code'] ?>">
        </div>
        <div>
            <label for="brand">PRODUCT BRAND:</label>
            <input type="text" name="product_brand" value="<?php echo $data['product_brand'] ?>">
        </div>
        <div>
            <label for="name">PRODUCT NAME:</label>
            <input type="text" name="product_name" value="<?php echo $data['product_name'] ?>">
        </div>
		  <div>
            <label for="quantity">QUANTITY:</label>
            <input type="text" name="quantity" value="<?php echo $data['quantity'] ?>">
        </div>
        <div>
            <label for="supplier">SUPPLIER:</label>
            <input type="text" name="supplier" value="<?php echo $data['supplier'] ?>">
        </div>
        <div>
            <label for="price">PRICE:</label>
            <input type="text" name="price" value="<?php echo $data['price'] ?>">
        </div>
        <div>
            <label for="purchase">PURCHASED DATE:</label>
            <input type="date" name="pdate" value="<?php echo $data['pdate'] ?>">
        </div>
        <div>
            <label for="end">END DATE:</label>
            <input type="date" name="edate" value="<?php echo $data['edate'] ?>">
        </div>

        <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">

        <button type="submit" name="update">Update Product</button>
    </form>
</body>
</html>