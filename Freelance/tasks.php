<?php
include 'db.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Create
if (isset($_POST['create'])) {
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);

    $stmt = $koneksi->prepare("INSERT INTO tasks (title, description, status) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $title, $description, $status);
    $stmt->execute();
}

// Read
$result = $koneksi->query("SELECT * FROM tasks");

// Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);

    $stmt = $koneksi->prepare("UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?");
    $stmt->bind_param('sssi', $title, $description, $status, $id);
    $stmt->execute();
}

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $koneksi->query("DELETE FROM tasks WHERE id = $id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="sidebar">
        <!-- Sidebar content -->
    </div>

    <div class="content">
        <h1>Task Management</h1>

        <!-- Create Form -->
        <h2>Add New Task</h2>
        <form method="POST">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <select name="status" required>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
            <button type="submit" name="create">Add Task</button>
        </form>

        <!-- Read Table -->
        <h2>Task List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <a href="?edit=<?php echo $row['id']; ?>">Edit</a>
                    <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <!-- Update Form -->
        <?php
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $edit_result = $koneksi->query("SELECT * FROM tasks WHERE id = $id");
            $edit_row = $edit_result->fetch_assoc();
        ?>
        <h2>Edit Task</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $edit_row['id']; ?>">
            <input type="text" name="title" value="<?php echo $edit_row['title']; ?>" required>
            <textarea name="description" required><?php echo $edit_row['description']; ?></textarea>
            <select name="status" required>
                <option value="Pending" <?php echo ($edit_row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="In Progress" <?php echo ($edit_row['status'] == 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
                <option value="Completed" <?php echo ($edit_row['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
            </select>
            <button type="submit" name="update">Update Task</button>
        </form>
        <?php } ?>
    </div>
</body>
</html>

