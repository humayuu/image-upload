<?php
require 'config/db.php';
try {

    $id = htmlspecialchars($_GET['id']);

    $image = $conn->prepare("SELECT * FROM product_tbl WHERE id = ?");
    $image->execute([$id]);
    $row = $image->fetch(PDO::FETCH_ASSOC);

    $oldImage = $row['product_image'];
    $oldMultipleImage = $row['multiple_image'];


    $sql = $conn->prepare("DELETE FROM product_tbl WHERE id = ?");
    $result = $sql->execute([$id]);

    if ($result) {
        // Delete main image
        if (!empty($oldImage) && file_exists($oldImage)) {
            unlink($oldImage);
        }

        // Delete multiple images
        if (!empty($oldMultipleImage)) {
            $multiImages = explode(',', $oldMultipleImage);
            foreach ($multiImages as $img) {
                $img = trim($img);
                if (!empty($img) && file_exists($img)) {
                    unlink($img);
                }
            }
        }

        header("Location: index.php?success=1");
        exit;
    }
} catch (PDOException $e) {
    error_log("Product Deletion failed in " . __FILE__ . " on line " . __LINE__ . " : " . $e->getMessage());
}


$conn = null;
