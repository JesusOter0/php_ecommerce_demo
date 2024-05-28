<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php
    if (isset($_GET['id'])) { // Aquí verifico si se ha pasado el parámetro 'id' en la URL
        include 'product_details.php'; // Aquí incluyo el archivo 'product_details.php' si se proporciona el parámetro 'id'
    } else {
        include 'products_list.php'; // Aquí incluyo el archivo 'products_list.php' si no se proporciona el parámetro 'id'
    }
    ?>
</body>
</html>