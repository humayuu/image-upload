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
    $name = filter_var($_POST['productName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $multiple = "image will be here";
    $image = null;


    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {

      $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
      $maxFileSize = 2 * 1024 * 1024; // 2MB

      $fileName     = $_FILES['productImage']['name'];
      $filetype     = $_FILES['productImage']['type'];
      $filesize     = $_FILES['productImage']['size'];
      $fileTmpName  = $_FILES['productImage']['tmp_name'];
      $ext      = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

      if ($filesize > $maxFileSize) {
        header("Location: {$_SERVER['PHP_SELF']}?sizeError=1");
        exit;
      }

      if (!in_array($ext, $allowedExt)) {
        header("Location: {$_SERVER['PHP_SELF']}?typeError=1");
        exit;
      }

      $uploadDir  = __DIR__ . '/uploads/products/';
      if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
      }

      $newName     = uniqid('pro_') . '_' . time() . '.' . $ext;
      $targetPath  = $uploadDir . $newName;

      if (!move_uploaded_file($fileTmpName, $targetPath)) {
        error_log("Failed moving single upload to: $targetPath");
        header("Location: {$_SERVER['PHP_SELF']}?uploadError=1");
        exit;
      }

      $image = 'uploads/products/' . $newName;

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
    } else {

      $image = "Image Will be here";
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