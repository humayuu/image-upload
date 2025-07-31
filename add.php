<?php
require 'config/db.php';
session_start();

if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['isSubmitted'])) {

  if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    header("Location: {$_SERVER['PHP_SELF']}?csrfError=1");
    exit;
  }

  try {
    $name      = filter_var($_POST['productName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $uploadDir = __DIR__ . '/uploads/products/';
    $allowedExt  = ['jpg', 'jpeg', 'png', 'gif'];
    $maxFileSize = 2 * 1024 * 1024; // 2MB

    // make sure upload dir exists
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0755, true);
    }

    // ---- single image ----
    $image = null;
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
      
      $ext  = strtolower(pathinfo($_FILES['productImage']['name'], PATHINFO_EXTENSION));
      $size = $_FILES['productImage']['size'];
      $tmp  = $_FILES['productImage']['tmp_name'];

      if ($size > $maxFileSize) {
        header("Location: {$_SERVER['PHP_SELF']}?sizeError=1");
        exit;
      }
      if (!in_array($ext, $allowedExt)) {
        header("Location: {$_SERVER['PHP_SELF']}?typeError=1");
        exit;
      }

      $newName = uniqid('pro_') . '_' . time() . '.' . $ext;
      if (!move_uploaded_file($tmp, $uploadDir . $newName)) {
        header("Location: {$_SERVER['PHP_SELF']}?uploadError=1");
        exit;
      }

      $image = 'uploads/products/' . $newName;
    }

    // ---- multiple images ----
    $multiNames = [];
    if (isset($_FILES['multipleImages']) && is_array($_FILES['multipleImages']['error']) && $_FILES['multipleImages']['error'][0] === UPLOAD_ERR_OK) {

      foreach ($_FILES['multipleImages']['name'] as $i => $origName) {
        $ext  = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
        $size = $_FILES['multipleImages']['size'][$i];
        $tmp  = $_FILES['multipleImages']['tmp_name'][$i];

        if ($size > $maxFileSize) {
          header("Location: {$_SERVER['PHP_SELF']}?sizeError=1");
          exit;
        }
        if (!in_array($ext, $allowedExt)) {
          header("Location: {$_SERVER['PHP_SELF']}?typeError=1");
          exit;
        }

        $newMulti = uniqid('pro_') . '_' . time() . "_$i." . $ext;
        if (!move_uploaded_file($tmp, $uploadDir . $newMulti)) {
          header("Location: {$_SERVER['PHP_SELF']}?uploadError=1");
          exit;
        }
        $multiNames[] = 'uploads/products/' . $newMulti;
      }
    }

    // implode into a comma-separated list (or leave null if none)
    $multiple = $multiNames ? implode(',', $multiNames) : null;

    // ---- insert ----
    $sql = $conn->prepare("INSERT INTO product_tbl (product_name, product_image, multiple_image) VALUES (?,?,?)");
    $result = $sql->execute([$name, $image, $multiple]);

    if ($result) {
      header("Location: index.php?success=1");
      exit;
    }
  } catch (PDOException $e) {
    error_log("Product adding failed in " . __FILE__ . " on line " . __LINE__ . " : " . $e->getMessage());
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Form</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>

<body>
  <div class="form-container">
    <h2 class="form-title">Add Product</h2>
    <form method="post" action="<?= basename(__FILE__) ?>" id="productForm" enctype="multipart/form-data">
      <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
      <div class="form-group">
        <label for="productName">Product Name</label>
        <input type="text" id="productName" name="productName" required>
      </div>

      <div class="form-group">
        <label for="productImage">Product Image</label>
        <input type="file" id="productImage" name="productImage" accept="image/*" class="file-input">
      </div>

      <div class="form-group">
        <label for="multipleImages">Multiple Images</label>
        <input type="file" id="multipleImages" name="multipleImages[]" accept="image/*" multiple class="file-input">
      </div>

      <button type="submit" name="isSubmitted" class="submit-btn">Add Product</button>
    </form>
  </div>
</body>

</html>

<?php $conn = null; ?>