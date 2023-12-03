<?php
include 'dbcont.php';

session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>STOCK MANAGEMENT</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;

        }

        h2 {
            text-align: center;
		
			
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            margin: 4px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            /* Adjust button font size */
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            /* Adjust spacing */
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #CD853F;
            color: white;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .header {
            background: #DEB887;
            color: white;
            padding: 15px;

            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }

        .button_out {
            background-color: #800000;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
            display: inline-block;
            border: none
            transition: background-color 0.3s;
        }

        .button_out:hover {
            background-color: #d32f2f;
        }

        .button_logout {
            background-color: #800000;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
            display: inline-block;
            border: none
            transition: background-color 0.3s;
        }

        .button_logout:hover {
            background-color: #d32f2f;
        }
		.button_report {
            background-color: #800000;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
            display: inline-block;
            border: none
         
        }

        .button_report:hover {
            background-color: #d32f2f;
        }
		button {
            background-color: #800000;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
            display: inline-block;
            border: none
            transition: background-color 0.3s;
        }
		button:hover {
            background-color: #d32f2f;
        }
		
		
    </style>
</head>

<body>
	<div class="header">
		<h1>Stock Management System</h1>
		<?php
		if (isset($_SESSION['username'])) {
			echo "<p>Welcome " . $_SESSION['username'] . "!</p>";
		}
		?>
		<p>Date: <?php echo date("d-m-y"); ?></p>

			<a href="stock_out.php" class="button_out">Stock Out</a>
			<a href="logout.php" class="button_logout">Log Out</a>
			<a href="stock_report.php" class="button_report">Stock Report</a>
		
	</div>

    <form action="add.php" method="post">
        <div class="form-group ms-3 mt-3">
            <label for="product_code">PRODUCT CODE</label>
            <input type="text" class="form-control" name="product_code">
        </div>
        <div class="form-group ms-3 mt-3">
            <label for="product_brand">PRODUCT BRAND</label>
            <input type="text" class="form-control" name="product_brand">
        </div>
        <div class="form-group ms-3 mt-3">
            <label for="name">PRODUCT NAME</label>
            <input type="text" class="form-control" name="product_name">
        </div>
        <div class="form-group ms-3 mt-3">
            <label for="quantity">QUANTITY</label>
            <input type="text" class="form-control" name="quantity">
        </div>
        <div class="form-group ms-3 mt-3">
            <label for="supplier">SUPPLIER</label>
            <input type="text" class="form-control" name="supplier">
        </div>
        <div class="form-group ms-3 mt-3">
            <label for="pdate">PURCHASED DATE</label>
            <input type="date" class="form-control" name="pdate">
        </div>
        <div class="form-group ms-3 mt-3">
            <label for="edate">END DATE</label>
            <input type="date" class="form-control" name="edate">
        </div>
        <div class="form-group ms-3 mt-3">
            <label for="price">PRICE</label>
            <input type="number" class="form-control" name="price" id="price" min="1" max="">
        </div>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </form>

    <h2>Stock In</h2>
    <table>
        <tr>
            <th>PRODUCT CODE</th>
            <th>PRODUCT BRAND</th>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>SUPPLIER</th>
            <th>PURCHASED DATE</th>
            <th>END DATE</th>
            <th>PRICE</th>
            <th>ACTION</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM product");
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>
                    <td>{$row['product_code']}</td>
                    <td>{$row['product_brand']}</td>
                    <td>{$row['product_name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['supplier']}</td>
                    <td>{$row['pdate']}</td>
                    <td>{$row['edate']}</td>
                    <td>{$row['price']}</td>
                    <td>
                        <form action='delete.php' method='GET'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <button type='submit' class='bg-blue-500 text-white px-3 py-1 rounded-md mr-2 hover:bg-red-600'>Delete</button>
                        </form>
                        <form action='update.php' method='GET'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <button type='submit' class='bg-purple-500 text-white px-3 py-1 rounded-md mr-2 hover:bg-red-600'>Update</button>
                        </form>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>

</html>
