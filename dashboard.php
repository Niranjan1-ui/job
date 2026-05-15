<?php
session_start();

/* ===== PAGE PROTECTION ===== */
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

/* ===== PAGE ROUTING ===== */
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html>
<head>
<title>Job Portal Dashboard</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: #f4f6f8;
}

/* NAVBAR */
.navbar {
    height: 60px;
    background: #007bff;
    color: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
}

/* PROFILE ICON */
.profile {
    width: 40px;
    height: 40px;
    background: white;
    color: #007bff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

/* MENU */
.menu a {
    color: white;
    text-decoration: none;
    margin-left: 20px;
    font-weight: bold;
}

.menu a:hover {
    text-decoration: underline;
}

/* CONTENT */
.content {
    padding: 20px;
}

.content h1 {
    color: #333;
}

.content p {
    font-size: 16px;
    line-height: 1.6;
    color: #555;
    margin-top: 15px;
}
</style>

</head>
<body>

<!-- NAVBAR -->
<div class="navbar">

    <!-- LEFT: PROFILE ICON -->
    <div class="profile">
        <?php echo strtoupper(substr($_SESSION['user'], 0, 1)); ?>
    </div>

    <!-- RIGHT: MENU -->
    <div class="menu">
        <a href="dashboard.php?page=home">Home</a>
        <a href="jobs.php">Jobs</a>
        <a href="applications.php">Applications</a>
        <a href="profile.php">Profile</a>
        <a href="login.php?logout=true">Logout</a>
    </div>

</div>

<!-- CONTENT -->
<div class="content">

<?php
/* ===== HOME PAGE (DEFAULT) ===== */
if ($page == 'home') {
?>
    <h1>Welcome to Job Portal, <?php echo $_SESSION['user']; ?> 👋</h1>

    <p>
        Our Job Portal is a web-based platform designed to connect job seekers
        with employers in an efficient and user-friendly manner. The main goal
        of this portal is to provide a centralized place where users can explore
        job opportunities, apply for positions, and manage their applications
        easily.
    </p>

    <p>
        This platform allows users to search for jobs based on different criteria
        such as job title, skills, and location. Employers can post job openings
        and review applications submitted by candidates. The system ensures a
        smooth communication process between recruiters and applicants, reducing
        the time and effort required for hiring.
    </p>

    <p>
        The Job Portal is developed using PHP and MySQL for backend processing,
        and HTML, CSS, and JavaScript for frontend design. User authentication
        is handled using sessions to ensure secure access to the dashboard.
        This project demonstrates core web development concepts such as database
        connectivity, session management, and dynamic content rendering.
    </p>

<?php
}
/* ===== JOBS PAGE ===== */
else if ($page == 'jobs') {
?>
    <h1>Available Jobs</h1>
    <p>Job listings will be displayed here.</p>

<?php
}
/* ===== APPLICATIONS PAGE ===== */
else if ($page == 'applications') {
?>
    <h1>Your Applications</h1>
    <p>Your applied jobs will be shown here.</p>

<?php
}
/* ===== PROFILE PAGE ===== */
else if ($page == 'profile') {
?>
    <h1>User Profile</h1>
    <p>Username: <strong><?php echo $_SESSION['user']; ?></strong></p>

<?php
}
?>

</div>

</body>
</html>
