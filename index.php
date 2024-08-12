<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <center>
        <h1>Login Page</h1>
        <br><br>
        <h3>
            <form name="form" method="POST" action="" onsubmit="return isValid()">
                Username : <input type="text" name="user"/> <br>
                Password : <input type="password" name="pass"/> <br> <br>
                <input type="submit" value="Login">
            </form>
        </h3>
    </center>
    <script>
        function isValid() {
            var user = document.forms["form"]["user"].value;
            var pass = document.forms["form"]["pass"].value;
            if(user === "" || pass === "") {
                alert("Username or Password is empty!");
                return false;
            }
            return true;
        }
    </script>

<?php
$servername = 'localhost';
$username = 'root';
$password = ''; // Adjust this to your MySQL setup
$db = 'shankar';

// Establishing connection to MySQL database
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['user']) && isset($_POST['pass'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $sql = "SELECT * FROM logintable WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    if($count == 1) {
        // Starting a session and redirecting to the welcome page
        session_start();
        $_SESSION['user'] = $username;
        header("Location: welcome.php");
        exit(); // Ensure script stops executing after redirect
    } else {
        echo "<script>alert('Login Failed')</script>";
    }
}
?>

</body>
</html>
