<?php
session_start();

/* ===== DATABASE CONNECTION ===== */
$conn = mysqli_connect("localhost", "root", "", "job");
if (!$conn) {
    die("Database connection failed");
}

$error = "";

/* ===== LOGIN + AUTO REGISTER ===== */
if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == "" || $password == "") {
        $error = "All fields are required";
    } else {

        // Check if user exists
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {

            // User exists → check password
            $row = mysqli_fetch_assoc($result);

            if ($row['password'] == $password) {
                $_SESSION['user'] = $username;
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid username or password";
            }

        } else {

            // User does not exist → insert user
            $insert = "INSERT INTO users (username, password)
                       VALUES ('$username', '$password')";

            if (mysqli_query($conn, $insert)) {
                $_SESSION['user'] = $username;
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Error inserting user";
            }
        }
    }
}

/* ===== LOGOUT ===== */
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<style>
body {
    font-family: Arial;
    background: #f2f2f2;
}
.box {
    width: 320px;
    margin: 100px auto;
    background: white;
    padding: 20px;
    box-shadow: 0 0 10px gray;
}
input {
    width: 100%;
    padding: 8px;
    margin-top: 10px;
}
button {
    width: 100%;
    padding: 8px;
    margin-top: 15px;
    background: #007bff;
    color: white;
    border: none;
}
.error {
    color: red;
    text-align: center;
}
</style>

</head>
<body>

<div class="box">

<h2 align="center">Login</h2>

<form method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button name="login">Login</button>
</form>

<div class="error"><?php echo $error; ?></div>

</div>

</body>
</html>
