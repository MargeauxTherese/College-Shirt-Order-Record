<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Add New User</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Enter name" required><br>
        <input type="email" name="email" placeholder="Enter email" required><br>
        <input type="text" name="phone" placeholder="Enter phone" required><br>
        <input type="submit" value="Save" class="btn">
    </form>

</body>
</html>
