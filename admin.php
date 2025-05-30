<?php
// Start the session
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // If not logged in, redirect to the login page
    header('Location: log_in.php');
    exit();
}

// If the admin is logged in, display the dashboard content
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard - Redcross Youth</title>
        <link rel="icon" href="./assets/images/RCY_LOGO.png" type="image/png">
        <link rel="stylesheet" href="./assets/css/admin_dashboard.css" />
        <link rel="stylesheet" href="./assets/css/nav.css" />
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

        <div class="dashboard">
            <h1>Welcome to the Admin Dashboard</h1>
            <p>Here you can manage all admin functionalities.</p>

            <!-- Logout Button -->
            <form method="POST" action="logout.php">
                <button type="submit">Logout</button>
            </form>
        </div>
        
        <script src="./assets/js/nav.js"></script>
        <script src="./assets/js/fadeJs/fadeAbout_us.js"></script>
        <script src="./assets/js/fadeJs/fadeGallery.js"></script>
    </body>
</html>
