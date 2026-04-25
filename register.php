<?php
include "db.php";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = "user";

    $sql = "INSERT INTO users (name, email, password, role)
            VALUES ('$name', '$email', '$password', '$role')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration successful! Please login'); 
        window.location='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card shadow p-4">

                <h3 class="text-center">Register</h3>

                <form method="POST">

                    <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>

                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                    <button name="register" class="btn btn-success w-100">Register</button>

                </form>

                <p class="text-center mt-2">
                    Already have account? <a href="login.php">Login</a>
                </p>

            </div>

        </div>
    </div>
</div>

</body>
</html>