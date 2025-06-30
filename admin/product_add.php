<?php require 'header.php'; ?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage Product</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                
                <div class="card" style="height: 900px;">
                    <div class="card-body">
                          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Product</h4>
                    </div>
                        <form method="POST" enctype="multipart/form-data">
                            <!-- Row 1: Brand, Category, SubCategory -->
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Brand</label>
                                    <div class="col-sm-3">
                                        <select class="form-select" name="brand" aria-label="Brand select">
                                            <option value="">Select Brand</option>
                                            <option value="1">Brand One</option>
                                            <option value="2">Brand Two</option>
                                            <option value="3">Brand Three</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-1 col-form-label">Category</label>
                                    <div class="col-sm-3">
                                        <select class="form-select" name="category" aria-label="Category select">
                                            <option value="">Select Category</option>
                                            <option value="1">Category One</option>
                                            <option value="2">Category Two</option>
                                            <option value="3">Category Three</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-1 col-form-label">SubCategory</label>
                                    <div class="col-sm-3">
                                        <select class="form-select" name="subcategory" aria-label="SubCategory select">
                                            <option value="">Select SubCategory</option>
                                            <option value="1">SubCategory One</option>
                                            <option value="2">SubCategory Two</option>
                                            <option value="3">SubCategory Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2: SubSubCategory, Product Name En, Product Name Urdu -->
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">SubSubCategory</label>
                                    <div class="col-sm-3">
                                        <select class="form-select" name="subsubcategory" aria-label="SubSubCategory select">
                                            <option value="">Select SubSubCategory</option>
                                            <option value="1">SubSubCategory One</option>
                                            <option value="2">SubSubCategory Two</option>
                                            <option value="3">SubSubCategory Three</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-1 col-form-label">Product Name En</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="text" name="product_name_en" placeholder="Product name" id="product-name-en">
                                    </div>
                                    <label class="col-sm-1 col-form-label">پروڈکٹ کا نام</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="text" name="product_name_urdu" placeholder="پروڈکٹ کا نام" id="product-name-urdu">
                                    </div>
                                </div>
                            </div>

                            <!-- Row 3: Product Code, Product Qty, Product Tags En -->
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Product Code</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="text" name="product_code" placeholder="Product Code" id="product-code">
                                    </div>
                                    <label class="col-sm-1 col-form-label">Product Qty</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="number" name="product_qty" placeholder="Product Quantity" id="product-qty">
                                    </div>
                                    <label class="col-sm-1 col-form-label">Product Tags En</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="product_tags_en" class="form-control" 
                                               data-role="tagsinput" placeholder="Product Tags En" id="product-tags-en">
                                    </div>
                                </div>
                            </div>

                            <!-- Row 4: Product Tags Urdu, Product Size En, Product Size Urdu -->
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">پروڈکٹ ٹیگز اردو</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="product_tags_urdu" class="form-control"
                                               data-role="tagsinput" placeholder="پروڈکٹ ٹیگز اردو" id="product-tags-urdu">
                                    </div>
                                    <label class="col-sm-1 col-form-label">Product Size En</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="product_size_en" class="form-control"
                                               data-role="tagsinput" placeholder="Product Size En" id="product-size-en">
                                    </div>
                                    <label class="col-sm-1 col-form-label">پروڈکٹ سائز اردو</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="product_size_urdu" class="form-control"
                                               data-role="tagsinput" placeholder="پروڈکٹ سائز اردو" id="product-size-urdu">
                                    </div>
                                </div>
                            </div>

                            <!-- Row 5: Product Color En, Product Color Urdu, Product Selling Price -->
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Product Color En</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="product_color_en" class="form-control"
                                               data-role="tagsinput" placeholder="Product Color En" id="product-color-en">
                                    </div>
                                    <label class="col-sm-1 col-form-label">پروڈکٹ کا رنگ اردو</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="product_color_urdu" class="form-control"
                                               data-role="tagsinput" placeholder="پروڈکٹ کا رنگ اردو" id="product-color-urdu">
                                    </div>
                                    <label class="col-sm-1 col-form-label">Product Selling Price</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="number" name="selling_price" step="0.01" 
                                               placeholder="Product Selling Price" id="selling-price">
                                    </div>
                                </div>
                            </div>

                            <!-- Row 6: Product Discount Price, Product Thumbnail, Multiple Images -->
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Product Discount Price</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="number" name="discount_price" step="0.01" 
                                               placeholder="Product Discount Price" id="discount-price">
                                    </div>
                                    <label class="col-sm-1 col-form-label">Product Thumbnail</label>
                                    <div class="col-sm-3">
                                        <input type="file" name="product_thumbnail" class="form-control" 
                                               accept="image/*" id="product-thumbnail">
                                    </div>
                                    <label class="col-sm-1 col-form-label">Multiple Images</label>
                                    <div class="col-sm-3">
                                        <input type="file" name="product_images[]" class="form-control" 
                                               accept="image/*" multiple id="product-images">
                                    </div>
                                </div>
                            </div>

                            <!-- Row 7: Product Descriptions -->
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Product Description English</label>
                                    <div class="col-sm-5">
                                        <textarea name="product_description_en" class="form-control" rows="5" 
                                                  placeholder="Enter product description in English" id="description-en"></textarea>
                                    </div>
                                    <label class="col-sm-1 col-form-label">پروڈکٹ تفصیل اردو</label>
                                    <div class="col-sm-5">
                                        <textarea name="product_description_urdu" class="form-control" rows="5" 
                                                  placeholder="پروڈکٹ کی تفصیل اردو میں درج کریں" id="description-urdu"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 8: Checkboxes -->
                            <div class="col-12">
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <div class="d-flex flex-wrap align-items-center gap-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hot_deals" value="1" id="hotDeals">
                                                <label class="form-check-label" for="hotDeals">Hot Deals</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="featured" value="1" id="featured">
                                                <label class="form-check-label" for="featured">Featured</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="special_offer" value="1" id="specialOffer">
                                                <label class="form-check-label" for="specialOffer">Special Offer</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="special_deals" value="1" id="specialDeals">
                                                <label class="form-check-label" for="specialDeals">Special Deals</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
                                        <button type="" class="btn btn-secondary ms-2">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>

<?php require 'footer.php'; ?>