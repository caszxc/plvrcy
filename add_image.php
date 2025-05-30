<?php
// Start session
session_start();

// Check if the user is logged in as an admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: log_in.php');
    exit();
}

// Handle the image upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    // Check if the file was uploaded without errors
    if ($_FILES['image']['error'] == 0) {
        // Get file details
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $file_type = pathinfo($file_name, PATHINFO_EXTENSION);
        
        // Define the allowed file types
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

        // Check if the file type is allowed
        if (in_array(strtolower($file_type), $allowed_types)) {
            // Define the upload folder based on category
            $category = $_POST['category']; // Get the category selected by admin
            $target_dir = "./assets/images/gallery/$category/";
            
            // Make sure the category folder exists, if not, create it
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            // Define the target file path
            $target_file = $target_dir . basename($file_name);

            // Check if the file already exists
            if (!file_exists($target_file)) {
                // Move the uploaded file to the target directory
                if (move_uploaded_file($file_tmp, $target_file)) {
                    $message = "File uploaded successfully!";
                } else {
                    $message = "Failed to upload the file.";
                }
            } else {
                $message = "File already exists.";
            }
        } else {
            $message = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    } else {
        $message = "Error in file upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image - Admin</title>
    <link rel="icon" href="./assets/images/RCY_LOGO.png" type="image/png">
    <link rel="stylesheet" href="./assets/css/nav.css">
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

    <div class="upload-container">
        <h2>Upload Image for Event, Training, or Volunteer</h2>
        
        <?php
        if (isset($message)) {
            echo "<p>$message</p>";
        }
        ?>
        
        <form method="POST" enctype="multipart/form-data">
            <label for="category">Category:</label>
            <select name="category" required>
                <option value="events">Events</option>
                <option value="trainings">Training</option>
                <option value="volunteers">Volunteers</option>
            </select>
            <br><br>
            <label for="image">Choose Image:</label>
            <input type="file" name="image" required />
            <br><br>
            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>
