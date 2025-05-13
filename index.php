<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>User List</h2>
    <a href="add.php" class="btn">Add New User</a>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['phone']."</td>
                            <td>
                                <a href='edit.php?id=".$row['id']."' class='btn'>Edit</a>
                                <a href='delete.php?id=".$row['id']."' class='btn-delete'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
