<?php
session_start();
include "db.php";

// Only admin access
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// join results with users
$sql = "SELECT results.*, users.name, users.email 
        FROM results 
        JOIN users ON results.user_id = users.id 
        ORDER BY results.id DESC";

$result = mysqli_query($conn, $sql);
?>

<h2>All Quiz Results 📊</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>User Name</th>
        <th>Email</th>
        <th>Score</th>
        <th>Total</th>
        <th>Date</th>
    </tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['score']; ?></td>
        <td><?php echo $row['total']; ?></td>
        <td><?php echo $row['date']; ?></td>
    </tr>
<?php } ?>

</table>

<br>
<a href="admin.php">Back to Admin Panel</a>