<!DOCTYPE html>
<html>
<head>
    <title>Hotel Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            color: black; /* Changed text color to black */
            background-color: #000;
            overflow: hidden;
        }
        video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            color: black; /* Changed table text color to black */
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            color: black; /* Changed form text color to black */
            margin: 0 auto;
            margin-top: 20px;
        }
        input[type="text"], input[type="date"], input[type="number"] {
            padding: 6px;
            width: 200px;
        }
        input[type="submit"] {
            padding: 6px 10px;
            background-color: black;
            color: white;
            border: none;
            cursor: pointer;
        }
        h2, h3 {
            text-align: center;
        }
    </style>
</head>
<body>
    <video autoplay muted loop>
        <source src="10915830-hd_1920_1080_24fps.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <h2>HOTEL MIRANDA</h2>
    
    <h3>Book a Room</h3>
    <form method="post" action="wadprob.php">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>
        <label>Email:</label>
        <input type="text" name="email" required><br><br>
        <label>Phone Number:</label>
        <input type="text" name="phno" required><br><br>
        <label>Check-in Date:</label>
        <input type="date" name="checkin_date" required><br><br>
        <label>Checkout Date:</label>
        <input type="date" name="checkout_date" required><br><br>
        <label>Number of Guests:</label>
        <input type="number" name="num_guests" required><br><br>
        <label>Room Type:</label>
        <select name="room_type" required>
            <option value="Standard">Standard room - 5500</option>
            <option value="Deluxe">Deluxe room - 7500</option>
            <option value="Suite">Suite room - 10000</option>
            <option value="Executive">Executive room - 12000</option>
        </select><br><br>
        <input type="submit" name="book" value="Book">
    </form>
</body>
</html>
