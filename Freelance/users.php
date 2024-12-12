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
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $koneksi->prepare("INSERT INTO tb_admin (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $email, $password);
    $stmt->execute();
}

// Read
$result = $koneksi->query("SELECT id, username, email FROM tb_admin");

// Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);

    $stmt = $koneksi->prepare("UPDATE tb_admin SET username = ?, email = ? WHERE id = ?");
    $stmt->bind_param('ssi', $username, $email, $id);
    $stmt->execute();
}

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $koneksi->query("DELETE FROM tb_admin WHERE id = $id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="sidebar">
        <!-- Add your sidebar content here -->
    </div>

    <div class="content">
        <h1>User Management</h1>

        <!-- Create Form -->
        <h2>Add New User</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="create">Add User</button>
        </form>

        <!-- Read and Update Table -->
        <h2>User List</h2>
        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="?edit=<?php echo $row['id']; ?>">Edit</a>
                    <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <?php
        if (isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];
            $edit_user = $koneksi->query("SELECT * FROM tb_admin WHERE id = $edit_id")->fetch_assoc();
        ?>
        <!-- Update Form -->
        <h2>Edit User</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $edit_user['id']; ?>">
            <input type="text" name="username" value="<?php echo $edit_user['username']; ?>" required>
            <input type="email" name="email" value="<?php echo $edit_user['email']; ?>" required>
            <button type="submit" name="update">Update User</button>
            <a href="generate_pdf.php" target="_blank">Generate PDF</a>     
        </form>
        <?php } ?>
    </div>
</body>
</html>