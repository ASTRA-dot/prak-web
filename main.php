<?php
session_start(); 

$error_message = '';

// Cek apakah form telah disubmit dengan username dan password
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Validasi username dan password
    if ($username == 'admin' && $password == 'admin') {
        // Jika username dan password benar, simpan sesi login
        $_SESSION['username'] = $username; // Atur sesi
    } else {
        // Jika salah, set pesan kesalahan dan arahkan ke login.php dengan parameter
        $error_message = 'Username atau password Anda salah';
        header("Location: login.php?error=" . urlencode($error_message));
        exit();
    }
} else {
    // Jika pengguna mencoba mengakses tanpa login, redirect ke login.php
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
   <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal text-body-emphasis">Novel List</h1>
   </div>
   <div class="row m-1 text-center justify-content-center">
    <div class="col-auto"> 
        <a href="add.php" class="btn btn-outline-primary">Add Novel</a>
    </div>
    <div class="col-auto ">
        <a href="logout.php" class="btn btn-outline-warning">Logout</a>
    </div>
</div>



   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>