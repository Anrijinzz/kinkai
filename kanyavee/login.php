<?php
session_start();
require 'connect.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Query ตรวจสอบผู้ใช้
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['username'] = $username;
        header("Location: dist/index.php");
        exit();
    } else {
        $error = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f0f2f5;">
  <div class="container">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-md-6 col-lg-5 col-xl-4">
        <div class="bg-white p-4 p-md-5 rounded shadow">
          <h3 class="text-center mb-4">Login</h3>

          <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
          <?php endif; ?>

          <form action="" method="POST">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="username" placeholder="username">
              <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-4">
              <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</body>
</html>
