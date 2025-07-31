<?php
require 'config/db.php';

$sql = $conn->prepare("SELECT * FROM product_tbl ORDER BY id DESC");
$sql->execute();

$products = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Table</title>
  <link rel="stylesheet" href="assets/table-styles.css">
</head>

<body>
  <div class="table-container">
    <div class="table-header">
      <h2 class="table-title">Product List</h2>
      <a href="add.php" style="text-decoration: none;" class="btn-add-product">Add Product</a>
    </div>
    <div class="table-wrapper">
      <?php if ($products): ?>
        <table id="productTable">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Main Image</th>
              <th>Multiple Images</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $product): ?>
              <tr>
                <td><?= htmlspecialchars($product['product_name']) ?></td>
                <td>
                  <div class="image-cell">
                    <img src="<?= $product['product_image'] ?>" alt="Product Image" class="product-image">
                  </div>
                </td>
                <td>
                  <div class="multiple-images">
                    <?php $images = explode(',', $product['multiple_image']);
                    foreach ($images as $imgPath): ?>
                      <img src="<?= $imgPath ?>" alt="Image" class="thumbnail">
                    <?php endforeach; ?>
                  </div>
                </td>

                <td>
                  <div class="action-buttons">
                    <a href="edit.php?id=<?= $product['id'] ?>" style="text-decoration: none;" class="btn-edit">Edit</a>
                    <a href="delete.php?id=<?= $product['id'] ?>" onclick="return confirm('Are You Sure?')" style="text-decoration: none;" class="btn-delete">Delete</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php else: ?>
        <div style="width:100%; background-color:aqua; color:black; font-size:70px; text-align:center;">No Record Found!</div>
      <?php endif; ?>
    </div>
  </div>


</body>

</html>

<?php $conn = null; ?>