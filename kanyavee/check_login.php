<?php
require_once 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<body></body>";

if ($username == "" || $password == "") {
    echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'เกิดข้อผิดพลาด',
            text: 'กรุณากรอก username หรือ password',
            confirmButtonText: 'ตกลง'
        }).then(function() {
            window.location.href='login.php';
        });
    </script>";
    exit();
} else {
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);

    $num = mysqli_num_rows($result);

    if ($num == 0) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: 'Username หรือ Password ไม่ถูกต้อง',
                confirmButtonText: 'ตกลง'
            }).then(function() {
                window.location.href='login.php';
            });
        </script>";
        exit();
    } else {
        // Successful login
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'เข้าสู่ระบบสำเร็จ',
                text: 'ยินดีต้อนรับเข้าสู่ระบบ',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href='dist/index.php';
            });
        </script>";
        exit();
    }
}
?>
