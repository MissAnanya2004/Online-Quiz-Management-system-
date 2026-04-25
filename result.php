<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$score = $_GET['score'];
$total = $_GET['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow p-4 text-center">

    <h2>🎉 Quiz Completed!</h2>

    <h3>Your Score:</h3>

    <h1 class="text-success"><?php echo $score; ?> / <?php echo $total; ?></h1>

    <a href="dashboard.php" class="btn btn-primary mt-3">Go Dashboard</a>

</div>

</div>

</body>
</html>