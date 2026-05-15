<?php
session_start();

/* ===== PROTECT PAGE ===== */
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user'];

/* ===== PROFILE IMAGE PATH ===== */
$uploadDir = "uploads/";
$defaultPic = "uploads/default.png";
$userPic = $uploadDir . $username . ".jpg";

/* ===== HANDLE IMAGE UPLOAD ===== */
if (isset($_POST['upload'])) {

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {

        $tmpName = $_FILES['photo']['tmp_name'];

        // Save image as username.jpg
        move_uploaded_file($tmpName, $userPic);
    }
}

/* ===== CHECK WHICH IMAGE TO SHOW ===== */
$profilePic = file_exists($userPic) ? $userPic : $defaultPic;
?>
<!DOCTYPE html>
<html>
<head>
<title>User Profile</title>

<style>
body {
    font-family: Arial;
    background: #f4f6f8;
}

.container {
    width: 60%;
    margin: 40px auto;
    background: white;
    padding: 20px;
    box-shadow: 0 0 10px gray;
}

.profile-img {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #007bff;
}

.header {
    display: flex;
    align-items: center;
    gap: 20px;
}

.section {
    margin-top: 25px;
}

.section h3 {
    border-bottom: 2px solid #007bff;
}
</style>

</head>
<body>

<div class="container">

    <!-- PROFILE HEADER -->
    <div class="header">
        <img src="<?php echo $profilePic; ?>" class="profile-img">
        <div>
            <h2><?php echo $username; ?></h2>
            <p>Job Seeker</p>
        </div>
    </div>

    <!-- UPLOAD FORM -->
    <div class="section">
        <h3>Change Profile Photo</h3>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="photo" required>
            <br><br>
            <button name="upload">Upload Photo</button>
        </form>
    </div>

    <!-- ABOUT ME -->
    <div class="section">
        <h3>About Me</h3>
        <p>
            I am a motivated job seeker looking for opportunities to enhance my
            skills and grow professionally. I am passionate about learning new
            technologies and contributing effectively to organizations.
        </p>
    </div>

    <!-- SKILLS -->
    <div class="section">
        <h3>Skills</h3>
        <ul>
            <li>HTML, CSS, JavaScript</li>
            <li>PHP & MySQL</li>
            <li>Web Development Basics</li>
        </ul>
    </div>

    <br>
    <a href="dashboard.php?page=home">⬅ Back to Dashboard</a>

</div>

</body>
</html>
