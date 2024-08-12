<?php

$conn = new mysqli('localhost','root', '', 'shankar');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['book'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
    $num_guests = $_POST['num_guests'];

    $sql = "INSERT INTO hotel_management (name, email, phno, checkin_date, checkout_date, num_guests)
            VALUES ('$name', '$email', '$phno', '$checkin_date', '$checkout_date', '$num_guests')";

    if ($conn->query($sql) === TRUE) {
        
        echo "<center><h1 style='color: black;'>ROOM BOOKED SUCCESSFULLY @ MIRANDA</h1></center>";

    
        $last_id = $conn->insert_id;

    
        $invoice_sql = "SELECT * FROM hotel_management WHERE id='$last_id'";
        $result = $conn->query($invoice_sql);

        if ($result->num_rows > 0) {
            
            echo "<div style='background-color: #333; color: #fff; padding: 20px; border-radius: 10px;'>";
            echo "<p style='font-size: 20px;'>Invoice Details:</p>";
            $row = $result->fetch_assoc();
            echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
            echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
            echo "<p><strong>Phone Number:</strong> " . $row['phno'] . "</p>";
            echo "<p><strong>Check-in Date:</strong> " . $row['checkin_date'] . "</p>";
            echo "<p><strong>Check-out Date:</strong> " . $row['checkout_date'] . "</p>";
            echo "<p><strong>Number of Guests:</strong> " . $row['num_guests'] . "</p>";
            echo "</div>";
        } else {
            echo "No invoice details found.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
