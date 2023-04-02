<?php
    require_once('config.php');

    // Execute the query
    $query = "SELECT * FROM product_table_links";
    $result = $conn->query($query);

    // Loop through the results and display each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["product_id"] . "<br>";
        // echo "Product Name: " . $row["product_name"] . "<br>";
        echo "Link: " . $row["flipkart_link"] . "<br>";
        echo "Link: " . $row["reliance_link"] . "<br>";
        echo "<br>";
    }

    // Close the connection
    $conn->close();


?>