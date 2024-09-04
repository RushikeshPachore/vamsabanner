<?php
include "config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $banner_id = $_POST['banner_id'];
  $top_tagline = $_POST['top_tagline'];
  $main_tagline = $_POST['main_tagline'];
  $last_tagline = $_POST['last_tagline'];

  // Initialize variables for the SQL query
  $image_path = ''; 

  // Check if a new image is uploaded
  if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] === 0) {
    $target_dir = "uploads/"; // Directory to store the uploaded files
    $target_file = $target_dir . basename($_FILES['image_path']['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validate file type (e.g., allow only certain file types)
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($imageFileType, $allowed_types)) {
      // Move uploaded file to the target directory
      if (move_uploaded_file($_FILES['image_path']['tmp_name'], $target_file)) {
        $image_path = $target_file;
      } else {
        echo "Error uploading the image.";
        exit;
      }
    } else {
      echo "Invalid file type.";
      exit;
    }
  }

  // Prepare the SQL query
  if ($image_path) {
    // If a new image is uploaded, update the image path as well
    $query = "UPDATE banners SET image_path = ?, top_tagline = ?, main_tagline = ?, last_tagline = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $image_path, $top_tagline, $main_tagline, $last_tagline, $banner_id);
  } else {
    // If no new image is uploaded, only update the text fields
    $query = "UPDATE banners SET top_tagline = ?, main_tagline = ?, last_tagline = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $top_tagline, $main_tagline, $last_tagline, $banner_id);
  }

  // Execute the query
  if ($stmt->execute()) {
    echo "Banner updated successfully.";
    // Redirect to a success page or back to the banner list
    header("Location: show_banner.php");
    exit;
  } else {
    echo "Error updating banner: " . $stmt->error;
  }

  // Close the statement
  $stmt->close();
}

// Close the connection
$conn->close();
