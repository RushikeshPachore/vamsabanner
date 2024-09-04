<?php
include('../config/db.php');


if ($_POST['email']) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['logged'] = true;
        $response = ['status' => 'success', 'message' => 'Login successful'];
    } else {
        $response = ['status' => 'error', 'message' => 'Invalid credentials'];
    }

    echo json_encode($response);
} else {
    // logout
    session_start();
    session_destroy();
    echo "<script>window.location.href = '../login.php'</script>";
}
