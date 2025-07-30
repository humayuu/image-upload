<?php
require 'config/db.php';
try {

    $id = htmlspecialchars($_GET['id']);

    $image = $conn->prepare("SELECT * FROM product_tbl WHERE id = ?");
    $image->execute([$id]);
    $row = $image->fetch(PDO::FETCH_ASSOC);

    $oldImage = $row['product_image'];


    $sql = $conn->prepare("DELETE FROM product_tbl WHERE id = ?");
    $result = $sql->execute([$id]);


    if ($result) {
        unlink($oldImage);
        header("Location: index.php?success=1");
    }
} catch (PDOException $e) {
    error_log("Product Delete Failed " . "in" . __FILE__ . "on" . __LINE__ . $e->getMessage());
}


$conn = null;
