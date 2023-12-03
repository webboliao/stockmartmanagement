<?php
include 'dbcont.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Stock Out Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;

        }

        h2 {
            text-align: center;
		
			
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
        <h1> Stock Management System</h1>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<p>Welcome, " . $_SESSION['username'] . "</p>";
        }
        ?>
       <a href="homepage.php" class="button_out">Stock In</a>
	   <a href="logout.php" class="button_logout">Log Out</a>
	   <a href="stock_report.php" class="button_report">Stock Report</a>
    </div>
    
    <h2>Stock Out Details</h2>
    <a href="search.php" class="button_logout">Search</a>
    
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
        </tr>
        <?php
        include "dbcont.php";

        $sql = "SELECT product_code, product_brand, product_name,  quantity, supplier, pdate, edate, price FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $totalPrice = 0;
            $totalQuantity = 0;

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["product_code"] . "</td>";
                echo "<td>" . $row["product_brand"] . "</td>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>" . $row["quantity"] . "</td>";
                echo "<td>" . $row["supplier"] . "</td>";
                echo "<td>" . $row["pdate"] . "</td>";
                echo "<td>" . $row["edate"] . "</td>";
				echo "<td>" . $row["price"] . "</td>";
                echo "</tr>";

                // Calculate total price and total quantity
                $totalPrice += $row["price"];
                $totalQuantity += $row["quantity"];
            }
			// Display the totals at the bottom of the table
            echo "<tr>";
            echo "<td colspan='3'><strong>Total:</strong></td>";
            echo "<td><strong>$totalQuantity</strong></td>";
            echo "<td colspan='1'></td>";
            echo "<td><strong>" . number_format($totalPrice, 2) . "</strong></td>";
            echo "</tr>";
        } else {
            echo "<tr><td colspan='8'>0 results</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>