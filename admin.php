<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4 text-center">

        <h2>👨‍💻 Admin Panel</h2>

        <p>Welcome Admin: <b><?php echo $_SESSION['name']; ?></b></p>

        <a href="add_question.php" class="btn btn-success m-2">Add Questions</a>

        <a href="view_results.php" class="btn btn-primary m-2">View Results</a>

        <a href="logout.php" class="btn btn-danger m-2">Logout</a>

    </div>

</div>

</body>
</html>