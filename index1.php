<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Management System</title>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
}
.container {
  width: 800px;
  margin: 20px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
table {
  width: 100%;
  border-collapse: collapse;
}
th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
th {
  background-color: #f2f2f2;
}
</style>
</head>
<body>
<div class="container">
<h2>Student Management System</h2>
<a href="add_student.php">Add New Student</a>
<br><br>
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Maths</th>
<th>Science</th>
<th>English</th>
<th>Total</th>
<th>Percentage</th>
</tr>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shankar";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Fetch student records from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $total = $row['maths'] + $row['science'] + $row['english'];
    $percentage = ($total / 300) * 100;
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['maths'] . "</td>";
    echo "<td>" . $row['science'] . "</td>";
    echo "<td>" . $row['english'] . "</td>";
    echo "<td>" . $total . "</td>";
    echo "<td>" . number_format($percentage, 2) . "%</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='8'>No students found</td></tr>";
}
$conn->close();
?>
</table>
</div>
</body>
</html>
