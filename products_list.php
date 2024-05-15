<?php
try {
    $conn = new PDO('pgsql:host=db;dbname=mydatabase', 'user', 'password');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query('SELECT * FROM products');
    $products = $stmt->fetchAll();

    echo "<h1>Products List</h1>";
    echo "<ul>";
    foreach ($products as $product) {
        echo "<li>";
        echo "<a href='index.php?id={$product['product_id']}'>";
        echo "<img src='{$product['image_path']}' alt='{$product['product_name']}'>";
        echo "{$product['product_name']}</a>";
        echo "</li>";
    }
    echo "</ul>";
} catch (PDOException $e) {
    echo 'Connection failed: An error occurred while fetching the products.';
}
?>