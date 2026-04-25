<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
let time = 300; // 5 minutes

setInterval(function () {
    if (time <= 0) {
        alert("Time is up!");
        document.getElementById("quizForm").submit();
    }

    let min = Math.floor(time / 60);
    let sec = time % 60;

    document.getElementById("timer").innerHTML =
        "Time Left: " + min + ":" + sec;

    time--;
}, 1000);
</script>
</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="text-center mb-4">Quiz 🧠</h2>

<form method="POST" action="submit_quiz.php">

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

<div class="card p-3 mb-3 shadow">

    <h5><?php echo $row['question']; ?></h5>

    <div class="form-check">
        <input type="radio" name="q<?php echo $row['id']; ?>" value="<?php echo $row['option1']; ?>">
        <?php echo $row['option1']; ?>
    </div>

    <div class="form-check">
        <input type="radio" name="q<?php echo $row['id']; ?>" value="<?php echo $row['option2']; ?>">
        <?php echo $row['option2']; ?>
    </div>

    <div class="form-check">
        <input type="radio" name="q<?php echo $row['id']; ?>" value="<?php echo $row['option3']; ?>">
        <?php echo $row['option3']; ?>
    </div>

    <div class="form-check">
        <input type="radio" name="q<?php echo $row['id']; ?>" value="<?php echo $row['option4']; ?>">
        <?php echo $row['option4']; ?>
    </div>

</div>

<?php } ?>

<button class="btn btn-primary w-100">Submit Quiz</button>

</form>

</div>

</body>
</html>