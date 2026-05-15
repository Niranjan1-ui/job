?php
session_start();

/* ===== PROTECT PAGE ===== */
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$applications = isset($_SESSION['applications']) ? $_SESSION['applications'] : [];
?>
<!DOCTYPE html>
<html>
<head>
<title>My Applications</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: #f4f6f8;
}

.navbar {
    height: 60px;
    background: #007bff;
    color: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
}

.menu a {
    color: white;
    text-decoration: none;
    margin-left: 20px;
    font-weight: bold;
}

.container {
    padding: 20px;
}

.job-card {
    background: white;
    padding: 15px;
    margin-bottom: 15px;
    box-shadow: 0 0 8px #ccc;
    border-left: 5px solid #28a745;
}
</style>

</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div><strong>Job Portal</strong></div>
    <div class="menu">
        <a href="dashboard.php?page=home">Home</a>
        <a href="jobs.php">Jobs</a>
        <a href="applications.php">Applications</a>
        <a href="profile.php">Profile</a>
        <a href="login.php?logout=true">Logout</a>
    </div>
</div>

<!-- APPLICATION LIST -->
<div class="container">
    <h2>My Applied Jobs</h2>

    <?php if (empty($applications)) { ?>
        <p>You have not applied for any jobs yet.</p>
    <?php } else { ?>
        <?php foreach ($applications as $app) { ?>
            <div class="job-card">
                <h3><?php echo $app['title']; ?></h3>
                <p><strong>Company:</strong> <?php echo $app['company']; ?></p>
                <p><strong>Location:</strong> <?php echo $app['location']; ?></p>
                <p><strong>Experience:</strong> <?php echo $app['experience']; ?></p>
                <p><strong>Status:</strong> Applied</p>
            </div>
        <?php } ?>
    <?php } ?>
</div>

</body>
</html>
