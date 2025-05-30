<?php
include 'config.php';

$item_id = $_GET['id'];

// Fetch the item to get the image file name
$sql = "SELECT image_url FROM inventory WHERE item_id = '$item_id'";
$result = $conn->query($sql);
$item = $result->fetch_assoc();

// Check if the item exists
if ($item) {
    $image_path = "./assets/images/item_images/" . $item['image_url'];

    // Delete the image file if it exists
    if (!empty($item['image_url']) && file_exists($image_path)) {
        unlink($image_path); // Deletes the image file
    }

    // Delete the record from the database
    $sql = "DELETE FROM inventory WHERE item_id = '$item_id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: inventory.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Item not found.";
}
?>
