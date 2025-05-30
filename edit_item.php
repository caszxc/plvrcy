<?php
include 'config.php';

// Define the available categories for the dropdown
$categories = [
    'First Aid Kits',
    'Personal Protective Equipment',
    'Bandages & Dressings',
    'Splints & Braces',
    'Stretchers & Transport Equipment',
    'Defibrillators (AED)',
    'Rescue Tools',
    'Burn Treatment Supplies',
    'Oxygen Equipment',
    'Thermal Blankets & Shelters',
    'Triage & Medical Response Kits',
    'First Aid Training Equipment',
    'Wound Care Equipment'
];

$item_id = $_GET['id'];
$sql = "SELECT * FROM inventory WHERE item_id = '$item_id'";
$result = $conn->query($sql);
$item = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_name = $_POST['item_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $item_condition = $_POST['condition'];

    // Handle image upload
    $image_name = $item['image_url']; // Keep the existing image by default
    if (!empty($_FILES['image']['name'])) {
        // Delete the old image if it exists
        $old_image_path = "assets/images/" . $item['image_url'];
        if (file_exists($old_image_path) && !empty($item['image_url'])) {
            unlink($old_image_path);
        }

        // Upload the new image
        $image_name = time() . "_" . basename($_FILES['image']['name']);
        $target_dir = "assets/images/";
        $target_file = $target_dir . $image_name;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            echo "Error uploading image.";
            exit();
        }
    }

    // Update the database
    $sql = "UPDATE inventory 
            SET item_name = '$item_name', 
                category = '$category', 
                description = '$description', 
                quantity = $quantity, 
                item_condition = '$item_condition', 
                image_url = '$image_name' 
            WHERE item_id = '$item_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: inventory.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/css/add_item.css">
        <link rel="stylesheet" href="./assets/css/nav.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <title>Add Item</title>
        <title>Edit Item</title>
    </head>
    <body>
        <header>
            <div class="logo-container">
                <img class="logo" src="./assets/images/RCY_LOGO.png" alt="Rcy Logo" />
                <div class="logo-text">Red Cross Youth</div>
            </div>
            <nav class="navbar">
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>

                    <div class="dropdown_gallery">
                        <li><a href="gallery.php">Gallery</a></li>
                        <div class="dropdown-content">
                            <div class="dropdown-grid">
                                <div>
                                    <h3>Gallery</h3>
                                    <a href="events.php">Events</a>
                                    <a href="training.php">Training</a>
                                    <a href="volunteer.php">Volunteers</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <li><a href="inventory.php">Inventory</a></li>

                    <div class="dropdown_about_us">
                        <a href="about_us.php">About Us</a>
                        <div class="dropdown-content">
                            <div class="dropdown-grid">
                                <div>
                                    <h3>About Us</h3>
                                    <a href="mission.php">Our Mission</a>
                                    <a href="vision.php">Our Vision</a>
                                </div>
                                <div>
                                    <h3>Our Services</h3>
                                    <a href="safety_services.php">Safety and Health Services</a>
                                    <a href="Blood_services.php">Blood Services</a>
                                    <a href="DisasterM.php">𝗗𝗶𝘀𝗮𝘀𝘁𝗲𝗿 𝗠𝗮𝗻𝗮𝗴𝗲𝗺𝗲𝗻𝘁 𝗦𝗲𝗿𝘃𝗶𝗰𝗲𝘀</a>
                                </div>
                                <div>
                                    <h3>The Team</h3>
                                    <a href="Sts.php">SkyTech Studios</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <li><a href="contact_us.php">Contact us</a></li>
                    <li class="form-login">
                        <?php
                        // Check if the user is logged in
                        if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                            // Display "Profile" link if logged in
                            echo '<a href="admin.php">Profile</a>';
                        } else {
                            // Display "Log in" link if not logged in
                            echo '<a href="log_in.php">Log in</a>';
                        }
                        ?>
                    </li>
                </ul>
            </nav>

            <div class="btn-container">
                <ul class="btn-links">
                    <a href="log_in.php">
                    <i class='fas fa-user-circle' ></i>
                    </a>
                </ul>
            </div>


            <div class="form">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>

        </header>

        <h1>Edit Item</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Item Name:</label>
            <input type="text" name="item_name" value="<?= $item['item_name'] ?>" required><br>

            <label>Category:</label>
            <select name="category" required>
                <option value="">Select Category</option>
                <?php foreach ($categories as $category_option): ?>
                    <option value="<?= $category_option ?>" <?= $category_option === $item['category'] ? 'selected' : '' ?>>
                        <?= $category_option ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label>Description:</label>
            <textarea name="description"><?= $item['description'] ?></textarea><br>

            <label>Quantity:</label>
            <input type="number" name="quantity" value="<?= $item['quantity'] ?>" required><br>

            <label>Condition:</label>
            <input type="text" name="condition" value="<?= $item['item_condition'] ?? '' ?>"><br>

            <label>Image:</label>
            <input type="file" name="image"><br>
            <p>Current Image:</p>
            <?php if (!empty($item['image_url'])): ?>
                <img src="./assets/images/item images<?= $item['image_url'] ?>" alt="<?= $item['item_name'] ?>" width="100"><br>
            <?php else: ?>
                <p>No image uploaded.</p>
            <?php endif; ?>

            <button type="submit">Update Item</button>
            <a href="inventory.php" class="cancel-btn">Cancel</a>
        </form>

        <script src="./assets/js/nav.js"></script>
        <script src="./assets/js/fadeJs/fadeAbout_us.js"></script>
        <script src="./assets/js/fadeJs/fadeGallery.js"></script>
    </body>
</html>
