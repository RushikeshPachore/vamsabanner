<?php
include('config/db.php');


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

  if (isset($_FILES["image_path"]) && $_FILES["image_path"]["error"] == 0) {
    //file details
    $filename = $_FILES["image_path"]["name"];
    $filetmp = $_FILES["image_path"]["tmp_name"];
    $filesize = $_FILES["image_path"]["size"];

    $upload_dir = 'uploads/';

    if (!file_exists($upload_dir)) {
      mkdir($upload_dir, 0777, true);
    }

    $unique_id = uniqid(); // Generate a unique ID
    $file_ext = pathinfo($filename, PATHINFO_EXTENSION); // Get file extension
    $unique_filename = $unique_id . '.' . $file_ext; // Append unique ID to the file extension
    $upload_file = $upload_dir . $unique_filename;

    // Move the uploaded file to the destination directory
    $upload_file = $upload_dir . basename($filename);

    if (move_uploaded_file($filetmp, $upload_file)) {
      // Get form data
      $image_path = $conn->real_escape_string($upload_file);
      $top_tagline = $conn->real_escape_string($_POST['top_tagline']);
      $main_tagline = $conn->real_escape_string($_POST['main_tagline']);
      $last_tagline = $conn->real_escape_string($_POST['last_tagline']);

      // SQL query to insert data into banners table
      $query = "INSERT INTO banners (image_path, top_tagline, main_tagline, last_tagline)
          VALUES ('$image_path', '$top_tagline', '$main_tagline', '$last_tagline' )";

      // Execute the query
      if ($conn->query($query) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Banner created successfully']);
      } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed: ' . $conn->error]);
      }
    }
  }
} else {
  echo json_encode(['status' => 'error', 'message' => 'Form not submitted correctly']);
}



function getAllBanners($conn)
{
  $sql = "SELECT * FROM banners";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    return $result->fetch_all(MYSQLI_ASSOC);
  } else {
    return [];
  }
}

$banners = getAllBanners($conn);
$conn->close();
