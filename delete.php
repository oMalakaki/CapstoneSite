<?php
try {
    // delete the product from the database
    $id = $_POST['product_number'];
    $sql = "DELETE FROM `product` WHERE `product_number`='$id'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        throw new Exception("Product does not exist.");
    } else {
        echo "<script>alert('Product deleted successfully.'); window.location.href = 'products.php';</script>";
    }
} catch (Exception $e) {
    echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = 'products.php';</script>";
}

?>