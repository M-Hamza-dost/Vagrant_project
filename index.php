<?php
$servername = "192.168.1.11";
$username = "myuser"; 
$password = "mypass";
$dbname = "mydatabase";
$port = "5432";

$conn = pg_connect("host=$servername dbname=$dbname user=$username password=$password port=$port");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = pg_escape_string($conn, $_POST['name']);
    $email = pg_escape_string($conn, $_POST['email']);
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    $result = pg_query($conn, $sql);
    
    if ($result) {
        echo "New record created successfully";
    } else {
        echo "Error: " . pg_last_error($conn);
    }
}

$result = pg_query($conn, "SELECT * FROM users");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
</head>
<body>
    <h1>User Form</h1>
    <form method="post" action="">
        Name: <input type="text" name="name" required>
        Email: <input type="email" name="email" required>
        <input type="submit" value="Submit">
    </form>

    <h2>Users List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php
        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
                echo "<tr><td>" . htmlspecialchars($row["id"]) . "</td><td>" . htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["email"]) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users found</td></tr>";
        }
        ?>
    </table>

</body>
</html>