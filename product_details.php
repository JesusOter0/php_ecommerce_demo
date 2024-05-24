<?php
try {
    $conn = new PDO('pgsql:host=db;dbname=mydatabase', 'user', 'password');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $product_id = intval($_GET['id']);

    $stmt = $conn->prepare('SELECT * FROM products WHERE product_id = :product_id');
    $stmt->execute(['product_id' => $product_id]);
    $product = $stmt->fetch();

    if ($product) {
        echo "<h1>{$product['product_name']}</h1>";
        echo "<p>Price: \${$product['price']}</p>";
        echo "<p>Quantity: {$product['quantity']}</p>";
        echo "<p>Category: {$product['category']}</p>";
        echo "<img src='{$product['image_path']}' alt='{$product['product_name']}'>";
    } else {
        echo "<p>Producto no encontrado.</p>";
    }
} catch (PDOException $e) {
    echo 'se ha producido un error al cargar los productos.';
}
?>