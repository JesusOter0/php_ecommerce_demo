<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php
    if (isset($_GET['id'])) {
        include 'product_details.php';
    } else {
        include 'products_list.php';
    }
    ?>
</body>
</html>
