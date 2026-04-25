<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card shadow p-4">

                <h3 class="text-center">Login</h3>

                <?php if (isset($error)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>

                <form method="POST">
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                    <button name="login" class="btn btn-primary w-100">Login</button>
                </form>

                <!-- ✅ REGISTER LINK ADDED HERE -->
                <p class="text-center mt-3 mb-0">
                    Don't have an account?
                    <a href="register.php">Register here</a>
                </p>

            </div>

        </div>
    </div>
</div>

</body>
</html>