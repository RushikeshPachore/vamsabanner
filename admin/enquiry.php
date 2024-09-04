<?php
include('config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name =$_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $service = $_POST['service'];

  $sql = "INSERT INTO enquiry (name,email,address,phone,service) VALUES ('$name','$email','$address','$phone','$service')";

  if ($conn->query($sql) === TRUE) {
    echo json_encode(['status' => 'success', 'message' => 'Banner created successfully']);
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Failed: ' . $conn->error]);
  }

}
