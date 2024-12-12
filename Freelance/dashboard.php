<?php
include 'db.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Count users
$user_count = $koneksi->query("SELECT COUNT(*) as count FROM tb_admin")->fetch_assoc()['count'];

// Count tasks (assuming you have a tasks table)
$task_count = $koneksi->query("SELECT COUNT(*) as count FROM tasks")->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="sidebar">
        <!-- Add your sidebar content here -->
    </div>

    <div class="content">
        <h1>Dashboard</h1>
        
        <div class="widgets">
            <div class="widget">
                <h3>Total Users</h3>
                <p><?php echo $user_count; ?></p>
            </div>
            <div class="widget">
                <h3>Total Tasks</h3>
                <p><?php echo $task_count; ?></p>
            </div>
        </div>

        <!-- Rest of your dashboard content -->
    </div>
</body>
</html>