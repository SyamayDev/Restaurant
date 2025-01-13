<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/login_admin.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="proses_login_admin.php" method="POST">
            <input type="text" name="admin_user" placeholder="Username" required>
            <input type="password" name="admin_pass" placeholder="Password" required>
            <p>belum punya akun admin? <a href="https://wa.me/6282267403010?text=Halo,%20saya%20ingin%20masuk%20sebagai%20admin." target="_blank">klik disini</a></p>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
