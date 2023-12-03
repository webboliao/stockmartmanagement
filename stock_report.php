<?php
include 'dbcont.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission to filter by date
    $PURCHASE = $_POST['purchase_date'];
    $EXPIRED = $_POST['expired_date'];

    // Use the entered date range to filter the SQL query
    $sql = "SELECT * FROM product WHERE pdate BETWEEN '$PURCHASE' AND '$EXPIRED'";
} else {
    // If no date range is provided, fetch all stock data
    $sql = "SELECT * FROM product";
}

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Stock Report</title>
    <style>
        body {
            font-family: monospace;
            background-color: burlywood;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background: red;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="purchase_date"],
        input[type="expired_date"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: pink;
            color: white;
            padding: 8px 12px;
            margin: 10px 0;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
    if ($result->num_rows > 0) {
        // Initialize variables for report
        $current_sales = 0;
        $highest_item_sales = 0;
        $insufficient_stock_count = 0;
        $sufficient_stock_count = 0;
        $total_capital = 0;

        while ($row = $result->fetch_assoc()) {
            // Ensure the quantity and price are treated as numeric values
            $quantity = intval($row['quantity']);
            $price = floatval($row['price']);

            // Calculate total capital
            $total_capital += $quantity * $price;

            // Check for insufficient stock
            if ($quantity < 10) {
                $insufficient_stock_count++;
            } else {
                $sufficient_stock_count++;
            }

            // Check for highest item sales
            $item_sales = $quantity * $price;
            if ($item_sales > $highest_item_sales) {
                $highest_item_sales = $item_sales;
            }

            // Update current sales
            $current_sales += $quantity;
        }

        // Display the report
        echo "<h2>Stock Report</h2>";
        echo "Current Sales: $current_sales <br>";
        echo "Highest Item Sales: $highest_item_sales <br>";
        echo "Insufficient Stock Count: $insufficient_stock_count <br>";
        echo "Sufficient Stock Count: $sufficient_stock_count <br>";
        echo "Total Capital: $total_capital <br>";
    } else {
        echo "No stock data available.";
    }

    $conn->close();
    ?>

    <!-- Add a form for users to input date range -->
    <form method="post">
        <label for="purchase_date">Date From:</label>
        <input type="date" name="purchase_date" required>

        <label for="expired_date">Date To:</label>
        <input type="date" name="expired_date" required>

        <button type="submit">Filter</button>
    </form>
</body>
</html>
