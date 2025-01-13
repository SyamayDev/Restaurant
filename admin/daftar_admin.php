<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../css/daftar_admin.css">
</head>
<body>
    <div class="register-container">
        <h2>Register Admin</h2>
        <form action="proses_daftar_admin.php" method="POST">
            <input type="text" name="admin_user" placeholder="Username" required>
            <input type="password" name="admin_pass" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
