<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2>Welcome 👋 <?php echo $_SESSION['name']; ?></h2>

        <p>Role: <b><?php echo $_SESSION['role']; ?></b></p>

        <hr>

        <!-- USER OPTION -->
        <a href="quiz.php" class="btn btn-primary m-2">
            Start Quiz
        </a>

        <!-- ADMIN OPTIONS -->
        <?php if ($_SESSION['role'] == 'admin') { ?>

            <a href="add_question.php" class="btn btn-success m-2">
                ➕ Add Questions
            </a>

            <a href="view_results.php" class="btn btn-warning m-2">
                📊 View Results
            </a>

        <?php } ?>

        <!-- LOGOUT (ALL USERS) -->
        <a href="logout.php" class="btn btn-danger m-2">
            🚪 Logout
        </a>

    </div>

</div>

</body>
</html>