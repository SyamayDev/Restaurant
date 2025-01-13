<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}

$host = "localhost";
$username = "root";
$password = "";
$database = "member_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM member";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard_admin.css">
</head>
<body>

<div class="container">
    <h2>Welcome, <?php echo $_SESSION['admin']; ?></h2>
    <h3>Member List</h3>

    <!-- Tampilkan pesan sukses atau error -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']); // Hapus session setelah ditampilkan
            ?>
        </div>
    <?php elseif (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?php 
            echo $_SESSION['error']; 
            unset($_SESSION['error']); // Hapus session setelah ditampilkan
            ?>
        </div>
    <?php endif; ?>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['no_hp']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <button class="edit-button" onclick="openEditModal('<?php echo $row['id']; ?>', '<?php echo $row['nama']; ?>', '<?php echo $row['no_hp']; ?>', '<?php echo $row['email']; ?>')">Edit</button>
                    <button class="hapus-button" onclick="openDeleteModal('<?php echo $row['id']; ?>', '<?php echo $row['nama']; ?>')">Delete</button>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<!-- Modal untuk Edit -->
<div id="editModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editModal')">&times;</span>
        <h3>Edit Member</h3>
        <form id="editForm" method="POST" action="edit_user.php">
            <input type="hidden" name="id" id="editId">
            <input type="text" name="name" id="editName" required><br><br>
            <input type="text" name="phone" id="editPhone" required><br><br>
            <input type="email" name="email" id="editEmail" required><br><br><br>
            <button class="update-button" type="submit">Update</button>
        </form>
    </div>
</div>

<!-- Modal untuk Hapus -->
<div id="deleteModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal('deleteModal')">&times;</span>
        <h3>Delete Member</h3>
        <p id="deleteMessage"></p>
        <form id="deleteForm" method="POST" action="hapus_user.php">
            <input type="hidden" name="id" id="deleteId">
            <button class="yakin-button" type="submit">Yakin</button>
            <button class="batal-button" type="button" onclick="closeModal('deleteModal')">Batal</button>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, name, phone, email) {
        // Masukkan data ke dalam modal
        document.getElementById('editId').value = id;
        document.getElementById('editName').value = name;
        document.getElementById('editPhone').value = phone;
        document.getElementById('editEmail').value = email;

        // Tampilkan modal
        document.getElementById('editModal').style.display = 'block';
    }

    function openDeleteModal(id, name) {
        // Masukkan pesan konfirmasi ke dalam modal
        document.getElementById('deleteMessage').textContent = 'Apakah Anda yakin ingin menghapus member ' + name + '?';
        document.getElementById('deleteId').value = id;

        // Tampilkan modal
        document.getElementById('deleteModal').style.display = 'block';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
</script>

<script>
    function openDeleteModal(id, name) {
    // Masukkan pesan konfirmasi ke dalam modal
    document.getElementById('deleteMessage').textContent = 'Apakah Anda yakin ingin menghapus member ' + name + '?';
    document.getElementById('deleteId').value = id; // Isi ID yang akan dihapus ke dalam form

    // Tampilkan modal
    document.getElementById('deleteModal').style.display = 'block';
}
</script>

</body>
</html>

<?php
$conn->close();
?>
