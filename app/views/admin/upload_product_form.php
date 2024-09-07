<?php require "header.php"; ?>

<div class="main-content">

<div class="content">
            <h2>Upload New Product</h2>
            <form action="upload_product.php" method="POST" enctype="multipart/form-data">
                <label for="productName">Product Name:</label><br>
                <input type="text" id="productName" name="productName" required><br><br>

                <label for="productDesc">Description:</label><br>
                <textarea id="productDesc" name="productDesc" rows="4" required></textarea><br><br>

                <label for="price">Price:</label><br>
                <input type="text" id="price" name="price" required><br><br>

                <label for="stock">Stock Quantity:</label><br>
                <input type="number" id="stock" name="stock" required><br><br>

                <label for="sku">SKU:</label><br>
                <input type="text" id="sku" name="sku" required><br><br>

                <label for="category">Category:</label><br>
                <input type="text" id="category" name="category" required><br><br>

                <label for="productImage">Upload Image:</label><br>
                <input type="file" id="productImage" name="productImage" required><br><br>

                <input type="submit" value="Upload Product">
            </form>
        </div>
    </div>


</div>


<?php require "footer.php"; ?>