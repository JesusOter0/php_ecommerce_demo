<?php
try {
    // Aquí intento conectarme a la base de datos PostgreSQL.
    $conn = new PDO('pgsql:host=db;dbname=mydatabase', 'user', 'password');
    // Configuro el modo de error para que me lance excepciones si hay errores.
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Aquí saco el ID del producto de la URL y lo convierto a un entero.
    $product_id = intval($_GET['id']);

    // Preparo una consulta SQL para encontrar un producto por su ID.
    $stmt = $conn->prepare('SELECT * FROM products WHERE product_id = :product_id');
    // ¡Ejecuto la consulta SQL con el ID del producto como parámetro!
    $stmt->execute(['product_id' => $product_id]);
    // Aquí saco la primera fila del resultado de la consulta como un array asociativo.
    $product = $stmt->fetch();

    // informacion del producto
    if ($product) {
        echo "<h1>{$product['product_name']}</h1>"; // Aquí muestro el nombre del producto.
        echo "<p>Price: \${$product['price']}</p>"; // ¡Aquí muestro el precio del producto
        echo "<p>Quantity: {$product['quantity']}</p>"; // Aquí muestro la cantidad disponible del producto!
        echo "<p>Category: {$product['category']}</p>"; // Aquí muestro la categoría del producto.
        echo "<img src='{$product['image_path']}' alt='{$product['product_name']}'>"; // Aquí muestro la imagen del producto
    } else {
        echo "<p>¡No encontré el producto!</p>"; // Si no encuentra el producto, sale un mensaje de error.
    }
} catch (PDOException $e) {
    echo '¡Ups! Hubo un problema al cargar los productos.'; // Si hay un error al conectar con la base de datos, aparece un mensaje de error.
}
?>