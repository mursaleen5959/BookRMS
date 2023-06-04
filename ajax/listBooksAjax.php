<?php

require_once('../includes/db.php');

if(isset($_POST['bookView']))
{
    // Select data from the database
    $query = "SELECT * FROM `books_read` WHERE id={$_POST['id']}";
    $result = mysqli_query($conn, $query);
    
    // Check if the query was successful
    if (!$result) {
        die('Query execution failed: ' . mysqli_error($conn));
    }
    
    // Create an array to store the retrieved data
    $data = array();
    
    // Fetch the rows from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    // Close the database connection
    mysqli_close($conn);
    
    // Convert the data to JSON format
    $jsonData = json_encode($data);
    
    // Set the response header as JSON
    header('Content-Type: application/json');
    
    // Return the JSON data
    echo $jsonData;
}