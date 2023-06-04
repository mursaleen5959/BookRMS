<?php
require_once('../includes/db.php');

// Execute the SQL query
$query = "SELECT YEAR(book_read_date) AS year, COUNT(*) AS record_count
          FROM books_read
          GROUP BY YEAR(book_read_date)";

$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Fetch the data
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Convert data to JSON format
    $jsonData = json_encode($data);

    // Output the JSON data
    header('Content-Type: application/json');
    echo $jsonData;
} else {
    // Error occurred
    echo "Error executing query: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
