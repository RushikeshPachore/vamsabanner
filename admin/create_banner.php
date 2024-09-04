<?php
include "config/db.php";
include "inc/header.php";

?>

<?php
// check logged in
if ($_SESSION['logged'] === true) :
?>
    <main class="main">
        <div class="container">
            <div class="banner-card">
                <h3>Create Banner</h3>
                <form method="POST" action="banner.php" enctype="multipart/form-data">
                    <label>Image Path</label>
                    <input type="file" name="image_path" required>
                    <br>
                    <label>Top Tagline</label>
                    <input type="text" name="top_tagline" required>
                    <br>
                    <label>Main Tagline</label>
                    <input type="text" name="main_tagline" required>
                    <br>
                    <label>Last Tagline</label>
                    <input type="text" name="last_tagline" required>
                    <button type="submit" name="submit" value="submit">Submit</button>
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