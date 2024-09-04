<?php
include('../config/db.php');

if ($_POST) {
    $full_name = $_POST['full_name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $branch_id = $_POST['id'];
    $date = date('Y-m-d H:i:s');
    $course_id = $_POST['course_id'] ;
    $amount = "0" ;

    $sql = "INSERT INTO `candidate_registre` (`name`, `father_name`, `mother_name`, `email`, `mobile`, `address`, `password`, `branch`,`date`) VALUES ('$full_name', '$father_name', '$mother_name', '$email', '$phone', '$address', '$password', '$branch_id', '$date')";
    $result = mysqli_query($conn, $sql);
    $insertId = mysqli_insert_id($conn);

    $sql2 = "INSERT INTO `candidate_subscribe` (`sub_nm`, `stu_id`, `date`,`amount`,`status`,`name`,`email`,`contact`,`address`) VALUES ('$course_id', '$insertId', '$date','$amount','new','$full_name','$email','$phone','$address')";
    $result2 = mysqli_query($conn, $sql2);

    if ($result && $result2) {
        echo json_encode(['status' => 'success', 'message' => 'Student registered successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Something went wrong']);
    }
}
