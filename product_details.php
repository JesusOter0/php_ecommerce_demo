<?php
try {
    $conn = new PDO('pgsql:host=db;dbname=mydatabase', 'user', 'password');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get product ID from URL
    $product_id = intval($_GET['id']);

    // Prepare a SQL query to find a product by its ID
    $stmt = $conn->prepare('SELECT * FROM products WHERE product_id = :product_id');
    $stmt->execute(['product_id' => $product_id]);
    $product = $stmt->fetch();

    // Product information
    if ($product) {
        echo "<h1>{$product['product_name']}</h1>";
        echo "<p>Price: \${$product['price']}</p>";
        echo "<p>Quantity: {$product['quantity']}</p>";
        echo "<p>Category: {$product['category']}</p>";
        echo "<img src='{$product['image_path']}' alt='{$product['product_name']}'>";

        // Fetch comments for the product
        $stmt = $conn->prepare('SELECT * FROM comments WHERE product_id = :product_id');
        $stmt->execute(['product_id' => $product_id]);
        $comments = $stmt->fetchAll();

        echo "<h2>Comments</h2>";
        if ($comments) {
            foreach ($comments as $comment) {
                echo "<p><strong>{$comment['user_name']}</strong>: {$comment['comment_text']}</p>";
            }
        } else {
            echo "<p>No comments yet. Be the first to comment!</p>";
        }

        // Comment submission form
        echo '<h3>Add a Comment</h3>';
        echo '<form method="post" action="add_comment.php">';
        echo '<input type="hidden" name="product_id" value="' . $product_id . '">';
        echo '<label for="user_name">Name:</label><br>';
        echo '<input type="text" id="user_name" name="user_name" required><br>';
        echo '<label for="comment_text">Comment:</label><br>';
        echo '<textarea id="comment_text" name="comment_text" required></textarea><br>';
        echo '<input type="submit" value="Submit">';
        echo '</form>';
    } else {
        echo "<p>¡No encontré el producto!</p>";
    }
} catch (PDOException $e) {
    echo '¡Ups! Hubo un problema al cargar los productos.';
}
?>