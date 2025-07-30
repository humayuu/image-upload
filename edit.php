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
    <form id="productForm">
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
        <input type="file" id="multipleImages" name="multipleImages" accept="image/*" multiple class="file-input">
      </div>

      <button type="submit" class="submit-btn">Add Product</button>
    </form>
  </div>
</body>

</html>