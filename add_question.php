<?php
session_start();
include "db.php";

// Only admin can access
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add'])) {
    $question = $_POST['question'];
    $op1 = $_POST['op1'];
    $op2 = $_POST['op2'];
    $op3 = $_POST['op3'];
    $op4 = $_POST['op4'];
    $answer = $_POST['answer'];

    $sql = "INSERT INTO questions (question, option1, option2, option3, option4, answer)
            VALUES ('$question', '$op1', '$op2', '$op3', '$op4', '$answer')";

    if (mysqli_query($conn, $sql)) {
        echo "Question added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Add Question</h2>

<form method="POST">
    Question:<br>
    <textarea name="question" required></textarea><br><br>

    Option 1: <input type="text" name="op1" required><br><br>
    Option 2: <input type="text" name="op2" required><br><br>
    Option 3: <input type="text" name="op3" required><br><br>
    Option 4: <input type="text" name="op4" required><br><br>

    Correct Answer: <input type="text" name="answer" required><br><br>

    <button type="submit" name="add">Add Question</button>
</form>

<br>
<a href="admin.php">Back to Admin Panel</a>