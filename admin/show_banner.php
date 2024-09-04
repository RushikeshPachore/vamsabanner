<?php include('banner.php');
include "inc/header.php";
include "config/db.php";

?>

<main>
  <div class="container2">
    <!-- banners in a table -->
    <div style="text-align: right; margin-top: 20px;">
      <a href="create_banner.php" class="btn">Create Banner</a>
    </div>
    <table>
      <thead>
        <tr>
          <th>Image</th>
          <th>Top Tagline</th>
          <th>Main Tagline</th>
          <th>Last Tagline</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($banners as $banner) : ?>
          <tr>
            <td><img src="<?= $banner['image_path']; ?>" alt="Banner Image" width="100"></td>
            <td><?= $banner['top_tagline']; ?></td>
            <td><?= $banner['main_tagline']; ?></td>
            <td><?= $banner['last_tagline']; ?></td>
            <td><?= $banner['created_at']; ?></td>
            <td>
              <a href="edit_banner.php?id=<?= $banner['id']; ?>" class="btn">Edit</a>
              <!-- You can add more actions like Delete if needed -->
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <!-- banner button -->
    <!-- <div style="text-align: right; margin-top: 20px;">
      <a href="edit_banner.php" class="btn">Edit Banner</a>
    </div> -->


  </div>
</main>
<?php include "inc/footer.php" ?>