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

    $id = htmlspecialchars($_POST['id']);
    $name      = filter_var($_POST['productName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $uploadDir = __DIR__ . '/uploads/products/';
    $allowedExt  = ['jpg', 'jpeg', 'png', 'gif'];
    $maxFileSize = 2 * 1024 * 1024; // 2MB


    // make sure upload dir exists
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0755, true);
    }


    $row = $conn->prepare("SELECT * FROM product_tbl WHERE id = :id");
    $row->bindParam(":id", $id);
    $row->execute();
    $productImage = $row->fetch(PDO::FETCH_ASSOC);
    $oldImage =  $productImage['product_image'];
    $oldMultiImage =  $productImage['multiple_image'];



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

        $sql = $conn->prepare("UPDATE product_tbl SET product_name = :pname, product_image = :pimage, multiple_image = :mpimage WHERE id = :id");
        $sql->bindParam(":pname", $name);
        $sql->bindParam(":pimage", $image);
        $sql->bindParam(":mpimage", $multiNames);
        $sql->bindParam(":id", $id);
        $result = $sql->execute();

        if ($result) {
          header("Location: index.php?success=1");
          exit;
        }
      } else {

        $multiple = $oldMultiImage;
        $image = $oldImage;
        $sql = $conn->prepare("UPDATE product_tbl SET product_name = :pname, product_image = :pimage, multiple_image = :mpimage WHERE id = :id");
        $sql->bindParam(":pname", $name);
        $sql->bindParam(":pimage", $image);
        $sql->bindParam(":mpimage", $multiple);
        $sql->bindParam(":id", $id);
        $result = $sql->execute();

        if ($result) {
          header("Location: index.php?success=1");
          exit;
        }
      }
    }
  } catch (PDOException $e) {
    error_log("Product adding Failed " . "in" . __FILE__ . "on" . __LINE__ . $e->getMessage());
  }
}

$id = htmlspecialchars($_GET['id']);

$sql = $conn->prepare("SELECT * FROM product_tbl WHERE id = :id");
$sql->bindParam(":id", $id);
$sql->execute();

$product = $sql->fetch(PDO::FETCH_ASSOC);


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
    <h2 class="form-title">Edit Product</h2>
    <form method="post" action="<?= basename(__FILE__) ?>" id="productForm" enctype="multipart/form-data">
      <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
      <input type="hidden" name="id" value="<?= $product['id'] ?>">
      <div class="form-group">
        <label for="productName">Product Name</label>
        <input type="text" id="productName" name="productName" required value="<?= $product['product_name'] ?>">
      </div>

      <div class="form-group">
        <label for="productImage">Product Image</label>
        <input type="file" id="productImage" name="productImage" accept="image/*" class="file-input">
        <img src="<?= $product['product_image'] ?>" width="100" alt="image">
      </div>

      <div class="form-group">
        <label for="multipleImages">Multiple Images</label>
        <input type="file" id="multipleImages" name="multipleImages" accept="image/*" multiple class="file-input">
      </div>

      <button type="submit" name="isSubmitted" class="submit-btn">Update Product</button>
    </form>
  </div>
</body>

</html>

<?php $conn = null; ?>