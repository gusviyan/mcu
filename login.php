<?php
// Memulai sesi
session_start();

// Cek apakah pengguna sudah login, jika ya, redirect ke halaman utama
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Include file koneksi database
include 'koneksi.php';

// Jika form login disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa keberadaan pengguna dalam database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        // Pengguna ditemukan, set sesi login
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['fullname'] = $user['fullname']; // Pastikan $fullname diambil dari hasil query
        // Redirect ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        // Pengguna tidak ditemukan atau password tidak cocok
        $error = "Username atau password salah. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style_login.css">
</head>
<body>
    <div class="container">
    <img src="logors.png" alt="Logo" class="logo">
        <h2>Medical Check Up</h2>
        <?php if(isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
