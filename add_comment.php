<?php
try {
    $conn = new PDO('pgsql:host=db;dbname=mydatabase', 'user', 'password');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Coger los datos
    $product_id = intval($_POST['product_id']);
    $user_name = $_POST['user_name'];
    $comment_text = $_POST['comment_text'];

    // Insertar un nuevo comentario, lo sacamos de la base de datos.
    $stmt = $conn->prepare('INSERT INTO comments (product_id, user_name, comment_text) VALUES (:product_id, :user_name, :comment_text)');
    $stmt->execute([
        'product_id' => $product_id,
        'user_name' => $user_name,
        'comment_text' => $comment_text
    ]);

    // Nos redirije a la pagina productos.
    header('Location: index.php?id=' . $product_id);
    exit;
} catch (PDOException $e) {
    echo 'Hubo un problema al añadir el comentario.';
}
?>