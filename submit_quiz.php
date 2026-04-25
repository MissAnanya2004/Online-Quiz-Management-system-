<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);

$score = 0;
$total = mysqli_num_rows($result);

while ($row = mysqli_fetch_assoc($result)) {

    $qid = $row['id'];
    $correct = $row['answer'];

    if (isset($_POST['q'.$qid])) {
        $user_answer = $_POST['q'.$qid];

        if ($user_answer == $correct) {
            $score++;
        }
    }
}

// save result
mysqli_query($conn, "INSERT INTO results (user_id, score, total)
VALUES ($user_id, $score, $total)");

echo "<h2>Your Score: $score / $total</h2>";

echo "<a href='dashboard.php'>Go Back</a>";
?>