<?php
include "config/db.php";
include "inc/header.php";

// Assuming you are passing the banner ID in the URL as a GET parameter
$banner_id = $_GET['id'] ?? null;
if ($banner_id) {
  // Fetch the banner details from the database using the banner ID
  $query = "SELECT * FROM banners WHERE id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $banner_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $banner = $result->fetch_assoc();
}
?>

<?php
// Check if logged in
if ($_SESSION['logged'] === true && $banner) :
?>
  <main class="main">
    <div class="container">
      <div class="banner-card">
        <h3>Update Banner</h3>
        <form method="POST" action="update_banner.php" enctype="multipart/form-data">
          <input type="hidden" name="banner_id" value="<?php echo $banner['id']; ?>">

          <label>Image Path</label>
          <input type="file" name="image_path">
          <br>
          <label>Top Tagline</label>
          <input type="text" name="top_tagline" value="<?php echo $banner['top_tagline']; ?>" required>
          <br>
          <label>Main Tagline</label>
          <input type="text" name="main_tagline" value="<?php echo $banner['main_tagline']; ?>" required>
          <br>
          <label>Last Tagline</label>
          <input type="text" name="last_tagline" value="<?php echo $banner['last_tagline']; ?>" required>
          <button type="submit" name="submit" value="submit">Update</button>
        </form>
      </div>
    </div>

  </main>
  <?php include "inc/footer.php" ?>
<?php else : ?>
  <script>
    window.location.href = "login.php";
  </script>
<?php endif; ?>