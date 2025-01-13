<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Member</title>
    <link rel="stylesheet" href="../css/style_member.css">
</head>
<body>
    <h1>Daftar Member Baru</h1>
    <form action="../pelanggan/proses_daftar.php" method="POST">
        <label for="nama">Nama Pelanggan:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        <label for="no_hp">Nomor Handphone (WA):</label>
        <input type="text" id="no_hp" name="no_hp" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>
