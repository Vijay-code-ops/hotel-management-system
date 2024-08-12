<?php

$conn = new mysqli('localhost','root','','shankar');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create food_orders table if not exists
$sql = "CREATE TABLE IF NOT EXISTS food_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cuisine_type VARCHAR(50),
    food_item VARCHAR(100)
)";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cuisineType = $_POST["cuisineType"];
    $foodItem = $_POST[$cuisineType . "Food"];

    // Prepare and execute SQL query to insert data into the database
    $stmt = $conn->prepare("INSERT INTO food_orders (cuisine_type, food_item) VALUES (?, ?)");
    $stmt->bind_param("ss", $cuisineType, $foodItem);

    if ($stmt->execute()) {
        // Data inserted successfully
        echo "Order placed successfully!";
    } else {
        // Error handling if insertion fails
        echo "Error: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
