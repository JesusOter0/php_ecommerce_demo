<?php
try {
    $conn = new PDO('pgsql:host=db;dbname=mydatabase', 'user', 'password');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get data from the form
    $product_id = intval($_POST['product_id']);
    $user_name = $_POST['user_name'];
    $comment_text = $_POST['comment_text'];

    // Prepare the SQL query to insert a new comment
    $stmt = $conn->prepare('INSERT INTO comments (product_id, user_name, comment_text) VALUES (:product_id, :user_name, :comment_text)');
    $stmt->execute([
        'product_id' => $product_id,
        'user_name' => $user_name,
        'comment_text' => $comment_text
    ]);

    // Redirect to the product details page to avoid form resubmission
    header('Location: index.php?id=' . $product_id);
    exit;
} catch (PDOException $e) {
    echo '¡Ups! Hubo un problema al añadir el comentario.';
}
?>