<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Management System</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('images/water-management-background.webp') no-repeat center center/cover;
        }

        .main-nav {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #2c3e50;
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        }

        .main-nav .title {
            margin-bottom: 30px;
            text-align: center;
        }

        .main-nav .title h3 {
            font-size: 1.5em;
            color: #1abc9c;
        }

        .main-nav ul {
            list-style-type: none;
            padding: 0;
            width: 100%;
        }

        .main-nav ul li {
            margin: 15px 0;
        }

        .main-nav ul li a {
            text-decoration: none;
            color: #ecf0f1;
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background: #34495e;
            border-radius: 8px;
            transition: background 0.3s, color 0.3s;
        }

        .main-nav ul li a:hover {
            background: #1abc9c;
            color: white;
        }

        .main-nav ul li a i {
            margin-right: 10px;
            font-size: 1.2em;
        }

        .main-content {
            margin-left: 270px;
            padding: 20px;
        }

        .header {
            background: #3498db;
            color: white;
            padding: 20px;
            border-bottom: 4px solid #2980b9;
            text-align: center;
            border-radius: 10px;
        }

        .content {
            margin: 20px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .cta-button {
            display: inline-block;
            padding: 15px 25px;
            background-color: #3498db;
            color: white;
            text-transform: uppercase;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #2980b9;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background: #2c3e50;
            color: #ecf0f1;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="main-nav">
        <div class="title">
            <h3><i class="fas fa-water"></i> Water Management</h3>
        </div>
        <ul>
            <li><a href="?tab=home"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="?tab=dashboard"><i class="fas fa-chart-line"></i> Dashboard</a></li>
            <li><a href="?tab=water_quality"><i class="fas fa-tint"></i> Water Quality</a></li>
            <li><a href="?tab=resource_management"><i class="fas fa-cogs"></i> Resource Management</a></li>
            <li><a href="?tab=report_issue"><i class="fas fa-exclamation-triangle"></i> Report an Issue</a></li>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                echo "<li><a href='?tab=reported_issues'><i class='fas fa-folder-open'></i> Reported Issues</a></li>";
                echo "<li><a href='#'><i class='fas fa-user'></i> Welcome, " . htmlspecialchars($_SESSION['username']) . "</a></li>";
                echo "<li><a href='logout.php'><i class='fas fa-sign-out-alt'></i> Logout</a></li>";
            }
            ?>
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <h3>Water Management System</h3>
        </div>
        <div class="content">
            <?php
            if (isset($_GET['tab'])) {
                $tab = $_GET['tab'];
                if ($tab == 'home') {
                    echo "<h2>Welcome to the Water Management System!</h2>";
                    echo "<p>This system is designed to monitor water quality, track resource management, and allow users to report issues efficiently.</p>";
                    echo "<div style='display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; margin-top: 20px;'>";

                    echo "<a href='?tab=dashboard' class='cta-button'><i class='fas fa-chart-line'></i> Explore Dashboard</a>";
                    echo "<a href='?tab=water_quality' class='cta-button'><i class='fas fa-tint'></i> Explore Water Quality</a>";
                    echo "<a href='?tab=resource_management' class='cta-button'><i class='fas fa-cogs'></i> Explore Resource Management</a>";
                    echo "<a href='?tab=report_issue' class='cta-button'><i class='fas fa-exclamation-triangle'></i> Report an Issue</a>";
                    echo "</div>";
                } elseif ($tab == 'dashboard') {
                    include 'dashboard.php';
                } elseif ($tab == 'water_quality') {
                    include 'water_quality.php';
                } elseif ($tab == 'resource_management') {
                    include 'resource_management.php';
                } elseif ($tab == 'report_issue') {
                    include 'report_issue.php';
                } elseif ($tab == 'reported_issues') {
                    include 'reported_issues.php';
                } else {
                    echo "<h2>Welcome to the Water Management System!</h2>";
                }
            } else {
                echo "<h2>Welcome to the Water Management System!</h2>";
                echo "<p>Explore the dashboard for statistics, check water quality data, or manage resources effectively.</p>";
                echo "<div style='display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; margin-top: 20px;'>";

                echo "<a href='?tab=dashboard' class='cta-button'><i class='fas fa-chart-line'></i> Explore Dashboard</a>";
                echo "<a href='?tab=water_quality' class='cta-button'><i class='fas fa-tint'></i> Explore Water Quality</a>";
                echo "<a href='?tab=resource_management' class='cta-button'><i class='fas fa-cogs'></i> Explore Resource Management</a>";
                echo "<a href='?tab=report_issue' class='cta-button'><i class='fas fa-exclamation-triangle'></i> Report an Issue</a>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <footer>
        <p>Water Management © 2024 | All Rights Reserved</p>
    </footer>
</body>
</html>
