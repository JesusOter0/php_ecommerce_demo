<?php
try {
    // Intento conectarme a la base de datos PostgreSQL.
    $conn = new PDO('pgsql:host=db;dbname=mydatabase', 'user', 'password');
    // Configuro el modo de error para que me lance excepciones si hay errores.
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ejecuto una consulta SQL para seleccionar todos los productos de la tabla 'products'.
    $stmt = $conn->query('SELECT * FROM products');
    // Obtengo todos los resultados de la consulta como un array.
    $products = $stmt->fetchAll();

    // Muestro el encabezado de la lista de productos.
    echo "<h1>Lista de Productos</h1>";
    // Comienzo una lista desordenada para mostrar los productos.
    echo "<ul>";
    // Itero sobre cada producto en la lista de productos.
    foreach ($products as $product) {
        // Comienzo un elemento de lista para un producto.
        echo "<li>";
        // Muestro un enlace a la página de detalles del producto con su ID.
        echo "<a href='index.php?id={$product['product_id']}'>";
        // Muestro la imagen del producto como un enlace.
        echo "<img src='{$product['image_path']}' alt='{$product['product_name']}'>";
        // Muestro el nombre del producto.
        echo "{$product['product_name']}</a>";
        // Cierro el elemento de lista para el producto.
        echo "</li>";
    }
    // Cierro la lista desordenada de productos.
    echo "</ul>";
} catch (PDOException $e) {
    // Muestro un mensaje de error si ocurre algún problema al cargar los productos.
    echo 'Se ha producido un error al cargar los productos.';
}
?>