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
          <tr>
            <td>Sample Product 1</td>
            <td>
              <div class="image-cell">
                <img src="#" alt="Product Image" class="product-image">
              </div>
            </td>
            <td>
              <div class="multiple-images">
                <img src="#" alt="Image 1" class="thumbnail">
                <img src="#" alt="Image 2" class="thumbnail">
                <img src="#" alt="Image 3" class="thumbnail">
              </div>
            </td>
            <td>
              <div class="action-buttons">
                <a href="edit.php" style="text-decoration: none;" class="btn-edit">Edit</a>
                <a href="delete.php" onclick="return confirm('Are You Sure?')" style="text-decoration: none;" class="btn-delete">Delete</a>
              </div>
            </td>
          </tr>
       
        </tbody>
      </table>
    </div>
  </div>


</body>
</html>