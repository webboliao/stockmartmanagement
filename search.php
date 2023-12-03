<!DOCTYPE html>
<html>
<head>
    <title>Stock Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .header {
            background: burlywood;
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin-bottom: 10px;
        }
        .header p {
            margin-bottom: 5px;
        }
        .header a {
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }
        .header button {
            background-color: moccasin;
            color: black;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
            display: inline-block;
            border: none;
        }
        .header button:hover {
            background-color: burlywood;
        }
        h2 {
            text-align: center;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        form input[type="text"],
        form button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form button {
            background-color: red;
            color: #fff;
            cursor: pointer;
            margin-left: 5px;
        }
        form button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Stock Management System</h1>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<p>Welcome, " . $_SESSION['username'] . "</p>";
        }
        ?>
        <p>Date: <?php echo date("d-m-Y"); ?></p>
        <a href="stock_form.php" ><button>Stock in</button></a>
        <a href="stock_out.php" ><button>Stock Out</button></a>
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>
    <h2>Search Stock</h2>
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Search...">
        <button type="submit">Search</button>
    </form>
    <?php
    include 'dbcont.php'; // Include your database connection

    if (isset($_GET['search'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $sql = "SELECT * FROM product WHERE 
                product_code LIKE '%$search%' OR 
                product_brand LIKE '%$search%' OR 
                product_name LIKE '%$search%' OR
                quantity LIKE '%$search%' OR
                supplier LIKE '%$search%' OR
                pdate LIKE '%$search%' OR
                edate LIKE '%$search%' OR
                price LIKE '%$search%' ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
                    <th>Product ID</th>
                    <th>Product Brand</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>supplier</th>
                    <th>Price</th>
                    <th>purchase date</th>
                    <th>expired date</th>
                  </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["product_code"] . "</td>";
                echo "<td>" . $row["product_brand"] . "</td>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>" . $row["quantity"] . "</td>";
                echo "<td>" . $row["supplier"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td>" . $row["pdate"] . "</td>";
                echo "<td>" . $row["edate"] . "</td>";
    
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No results found.";
        }
        $conn->close();
    }
    ?>
</body>
</html>
