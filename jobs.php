<?php
session_start();

/* ===== PROTECT PAGE ===== */
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
/* ===== HANDLE JOB APPLY ===== */
if (isset($_POST['apply'])) {
    $job = [
        'title' => $_POST['title'],
        'company' => $_POST['company'],
        'location' => $_POST['location'],
        'experience' => $_POST['experience']
    ];

    $_SESSION['applications'][] = $job;

    header("Location: applications.php");
    exit();
}


/* ===== JOB LIST (50 JOBS) ===== */
$jobs = [
    ["Web Developer", "ABC Tech", "Bangalore", "0-2 Years"],
    ["PHP Developer", "SoftSolutions", "Hyderabad", "1-3 Years"],
    ["Frontend Developer", "WebWorks", "Remote", "0-1 Year"],
    ["Backend Developer", "CodeBase", "Pune", "2-4 Years"],
    ["Full Stack Developer", "TechNova", "Chennai", "1-4 Years"],
    ["Software Engineer", "Infosys", "Bangalore", "0-2 Years"],
    ["Junior Developer", "TCS", "Mumbai", "Fresher"],
    ["Python Developer", "DataSoft", "Remote", "1-3 Years"],
    ["Java Developer", "Wipro", "Bangalore", "2-5 Years"],
    ["UI/UX Designer", "DesignHub", "Delhi", "0-2 Years"],

    ["Mobile App Developer", "Appify", "Noida", "1-3 Years"],
    ["React Developer", "Frontend Labs", "Remote", "1-2 Years"],
    ["Node.js Developer", "ServerSide", "Pune", "2-4 Years"],
    ["Database Administrator", "DB Corp", "Chennai", "3-5 Years"],
    ["System Analyst", "TechWorld", "Hyderabad", "2-4 Years"],
    ["QA Tester", "QualityWorks", "Bangalore", "0-2 Years"],
    ["Automation Tester", "TestPro", "Remote", "1-3 Years"],
    ["DevOps Engineer", "CloudNet", "Bangalore", "2-5 Years"],
    ["Cybersecurity Analyst", "SecureIT", "Delhi", "1-4 Years"],
    ["Network Engineer", "NetSolutions", "Mumbai", "2-4 Years"],

    ["Cloud Engineer", "AWS Hub", "Remote", "1-3 Years"],
    ["AI Engineer", "SmartAI", "Bangalore", "2-5 Years"],
    ["ML Engineer", "DeepTech", "Hyderabad", "1-4 Years"],
    ["Data Analyst", "DataVision", "Chennai", "0-2 Years"],
    ["Data Scientist", "AnalyticsPro", "Bangalore", "2-5 Years"],
    ["Business Analyst", "BizCorp", "Delhi", "1-3 Years"],
    ["HR Executive", "PeopleFirst", "Mumbai", "0-1 Year"],
    ["Technical Support", "HelpDesk", "Noida", "0-2 Years"],
    ["IT Support", "TechAssist", "Pune", "1-3 Years"],
    ["Product Manager", "InnovateX", "Bangalore", "3-6 Years"],

    ["Game Developer", "PlayTech", "Remote", "1-4 Years"],
    ["Blockchain Developer", "ChainWorks", "Bangalore", "2-5 Years"],
    ["Embedded Engineer", "ChipTech", "Chennai", "1-4 Years"],
    ["IoT Engineer", "SmartDevices", "Hyderabad", "1-3 Years"],
    ["AR/VR Developer", "VirtualLab", "Remote", "1-3 Years"],
    ["Ethical Hacker", "CyberShield", "Delhi", "1-4 Years"],
    ["Security Engineer", "InfoSecure", "Bangalore", "2-5 Years"],
    ["SOC Analyst", "ThreatWatch", "Mumbai", "0-2 Years"],
    ["Firmware Developer", "EmbeddedSys", "Pune", "2-4 Years"],
    ["System Administrator", "InfraTech", "Chennai", "2-5 Years"]
];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Available Jobs</title>

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

        .menu a:hover {
            text-decoration: underline;
        }

        .container {
            padding: 20px;
        }

        /* JOB CARD */
        .job-card {
            background: white;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 0 8px #ccc;
            border-left: 5px solid #007bff;
        }

        .job-card h3 {
            margin: 0;
        }

        .apply-btn {
            margin-top: 10px;
            padding: 6px 12px;
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
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
            <a href="profile.php">Profile</a>
            <a href="login.php?logout=true">Logout</a>
        </div>
    </div>

    <!-- JOB LIST -->
    <div class="container">
        <h2>Available Job Openings</h2>

        <?php foreach ($jobs as $job) { ?>
            <div class="job-card">
                <h3><?php echo $job[0]; ?></h3>
                <p><strong>Company:</strong> <?php echo $job[1]; ?></p>
                <p><strong>Location:</strong> <?php echo $job[2]; ?></p>
                <p><strong>Experience:</strong> <?php echo $job[3]; ?></p>
                <form method="post">
                    <input type="hidden" name="title" value="<?php echo $job[0]; ?>">
                    <input type="hidden" name="company" value="<?php echo $job[1]; ?>">
                    <input type="hidden" name="location" value="<?php echo $job[2]; ?>">
                    <input type="hidden" name="experience" value="<?php echo $job[3]; ?>">
                    <button class="apply-btn" name="apply">Apply</button>
                </form>

            </div>
        <?php } ?>

    </div>

</body>

</html>
