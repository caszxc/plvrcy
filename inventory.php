<?php
include 'config.php';
session_start();
// Fetch inventory items
$sql = "SELECT * FROM inventory ORDER BY category, item_name";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    <link rel="stylesheet" href="./assets/css/inventory.css">
    <link rel="stylesheet" href="./assets/css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <?php
                if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                    // If logged in, show the dashboard link
                    echo '<a href="admin.php"><i class="fas fa-user-circle"></i></a>';
                } else {
                    // If not logged in, show the login page link
                    echo '<a href="log_in.php"><i class="fas fa-user-circle"></i></a>';
                }
                ?>
            </ul>
        </div>


        <div class="form">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        
    </header>
    
    <h1>Inventory System</h1>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Item Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Condition</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td>
                    <?php if (!empty($row['image_url'])): ?>
                        <img src="./assets/images/item_images/<?= $row['image_url'] ?>" alt="<?= $row['item_name'] ?>" width="50">
                    <?php else: ?>
                        <img src="./assets/images/item images/no-image.png" alt="No Image" width="50">
                    <?php endif; ?>
                </td>
                <td data-label="Item Name"><?= $row['item_name'] ?></td>
                <td data-label="Category"><?= $row['category'] ?></td>
                <td data-label="Description"><?= $row['description'] ?></td>
                <td data-label="Quantity"><?= $row['quantity'] ?></td>
                <td data-label="Condition"><?= $row['item_condition'] ?></td>
                <td data-label="Actions">
                    <div class="action-con">
                        <a href="edit_item.php?id=<?= $row['item_id'] ?>" class="button">Edit</a>
                        <a href="delete_item.php?id=<?= $row['item_id'] ?>" class="button" onclick="return confirm('Are you sure?')">Delete</a>
                    </div>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>

    </table>
    <div class="add-btn-con">
       <a href="add_item.php" class="button" id="add_btn">Add New Item</a> 
    </div>
    
    
    <script src="./assets/js/nav.js"></script>
    <script src="./assets/js/fadeJs/fadeAbout_us.js"></script>
    <script src="./assets/js/fadeJs/fadeGallery.js"></script>
    
</body>
</html>
