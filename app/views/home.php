<?php 
       require "header.php";
?>

    <section class="banner">
        <h1>Welcome to FlexiMart</h1>
        <p>Your One-Stop Shop for All Your Needs</p>
        <a href="#" class="cta-button">Shop Now</a>
    </section>


    <section class="product-showcase">


    <?php if (!empty($products)) : ?>
        <ul>
            <?php foreach ($products['data']['productList'] as $product) : ?>
                <li>
                    <strong><?= $product['name'] ?></strong><br>
                    Price: <?= $product['price'] ?><br>
                    <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" width="100">
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        
        <p>No products found.</p>
    <?php endif; ?>
        <h2>Featured Products</h2>
        <div class="product-grid">
            <div class="product-card">
                <img src="product1.jpg" alt="Product 1">
                <h3>Product 1</h3>
                <p>$29.99</p>
                <a href="#" class="buy-button">Buy Now</a>
            </div>
            <div class="product-card">
                <img src="product2.jpg" alt="Product 2">
                <h3>Product 2</h3>
                <p>$49.99</p>
                <a href="#" class="buy-button">Buy Now</a>
            </div>
            <div class="product-card">
                <img src="product3.jpg" alt="Product 3">
                <h3>Product 3</h3>
                <p>$39.99</p>
                <a href="#" class="buy-button">Buy Now</a>
            </div>
        </div>
    </section>

<?php  
    require "footer.php";
?>
