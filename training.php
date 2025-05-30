<?php
// Start the session to check if the user is logged in
session_start();
include('config.php');

// Image Upload Handling
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['training_image'])) {
    // Handle Image Upload
    $target_dir = "./assets/images/gallery/training/";
    $target_file = $target_dir . basename($_FILES["training_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image
    if (getimagesize($_FILES["training_image"]["tmp_name"])) {
        // Move uploaded file to the directory
        if (move_uploaded_file($_FILES["training_image"]["tmp_name"], $target_file)) {
            // Insert file path into the database
            $sql = "INSERT INTO training_images (image_path) VALUES ('$target_file')";
            if ($conn->query($sql)) {
                echo "The file " . basename($_FILES["training_image"]["name"]) . " has been uploaded.";
            } else {
                echo "Error inserting image into database: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}

// Image Deletion
if (isset($_GET['delete_image']) && isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    $image_id = $_GET['delete_image'];
    // Retrieve the image path from the database
    $sql = "SELECT image_path FROM training_images WHERE id = $image_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image_path = $row['image_path'];

        // Delete image from folder and database
        if (unlink($image_path)) {
            $delete_sql = "DELETE FROM training_images WHERE id = $image_id";
            if ($conn->query($delete_sql)) {
                echo "Image deleted successfully.";
            } else {
                echo "Error deleting image from database.";
            }
        } else {
            echo "Error deleting the image file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Cross Youth - Training</title>
    <link rel="icon" href="./assets/images/RCY_LOGO.png" type="image/png">
    <link rel="stylesheet" href="./assets/css/training.css">
    <link rel="stylesheet" href="./assets/css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
                <a href="admin.php">
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

    <!-- Training Gallery Section -->
    <div class="mv">
        <hr class="line">
        <h1>Trainings</h1>
        <hr class="line">
    </div>
    <!-- Upload Image Form (only for admin) -->
    <?php
    if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
        echo '
        <div class="upload-form">
            <form action="training.php" method="POST" enctype="multipart/form-data">
                <label for="training_image">Upload New Image:</label>
                <input type="file" name="training_image" required>
                <button type="submit" name="submit">Upload</button>
            </form>
        </div>';
    }
    ?>

    <div class="containerGallery">
        <?php
        // Fetch images from the database
        $sql = "SELECT * FROM training_images ORDER BY created_at DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="image-container">
                        <a href="' . $row['image_path'] . '" data-lightbox="model">
                            <img src="' . $row['image_path'] . '" alt="Training Image">
                        </a>';

                    // Show delete option for admin
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                       echo '<a href="training.php?delete_image=' . $row['id'] . '" class="delete-btn">Delete</a>';
                    }
                echo '</div>';
            }
        }
        ?>
    </div>>

    

    <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h4> Links </h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="about_us.php">About</a></li>
                        
                        
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4> Location </h4>
                        <ul>
                            <li><a href="#">
                                Maysan Rd, Valenzuela, Philippines, 1440</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4> Contact Us </h4>
                        <ul>
                            <li><a href="#">plvredcrossyouth@gmail.com</a></li>
                            <li><a href="#">+639261689829</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Follow Us</h4>
                        <div class="social-links">
                            <a href="https://web.facebook.com/PLVRCYC"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    <script src="./assets/js/lightbox-plus-jquery.js"></script>
    <script src="./assets/js/nav.js"></script>
</body>
</html>
