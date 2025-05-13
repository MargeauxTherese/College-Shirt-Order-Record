<?php
include 'db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Edit User</h2>
    <form method="post">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br>
        <input type="submit" value="Update" class="btn">
    </form>

</body>
</html>
