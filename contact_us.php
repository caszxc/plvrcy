<?php
// Start the session to check if the user is logged in
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Contact us</title>
        <link rel="icon" href="./assets/images/RCY_LOGO.png" type="image/png">
    <link rel="stylesheet" href="./assets/css/contact.css">
    <link rel="stylesheet" href="./assets/css/nav.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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

                <?php
                // Check if the user is logged in as admin
                if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                    // Show the Inventory link if logged in
                    echo '<li><a href="inventory.php">Inventory</a></li>';
                }
                ?>
                 
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
 

    <div class="contact-container">
        <form action="https://api.web3forms.com/submit" method="POST" class="contact-left">
            <div class="contact-left-title">
                <h2>Send a message</h2>
                <hr>
            </div>
            <input type="hidden" name="access_key" value="f0e1dda9-7cb3-42d5-8365-490fd41e5ea8">
            <input type="text" name="name" placeholder="Your Name " class="contact-inputs" required>
            <input type="email" name="name" placeholder="Your email " class="contact-inputs" required>
            <textarea name="message" placeholder="Your Message" class="contact-inputs" required></textarea>
                <button type="submit">Submit<img src="assets/arrow_icon.png" alt=""></button>
        </form>

        <div class="contact-right">
             <img src="./assets/images/Gmail.png" alt="Gmail image">

        </div>
    </div>

<div class="address-container">
    <h1>Pamantasan ng Lungsod ng Valenzuela Maysan Campus</h1>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.3320878438053!2d120.96429289678953!3d14.693802699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b40a15031f27%3A0x182a347001dc73f!2sPLV%20Maysan%20Campus!5e0!3m2!1sen!2sph!4v1732517829872!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    
    <div class="info-section">
        <div class="info-item">
            <div class="info-icon">
                <a href="https://www.google.com/maps/place/Maysan+Road+%26+Tongco,+Valenzuela,+Metro+Manila/data=!4m2!3m1!1s0x3397b3fbd300db27:0x8e5bdaa07bdf926?sa=X&ved=1t:242&ictx=111"><i class="fa-solid fa-location-dot"></i></a>     
             </div>
            <div class="info-text">
                <strong>ADDRESS</strong><br>
                tongco st. Maysan Rd, Valenzuela, Metro Manila
            </div>
        </div>
        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-exclamation-circle"></i> <!-- Exclamation Circle Icon -->
  
                   </div>


            <div class="info-text">
                <strong>EMERGENCY HOTLINE</strong><br>
                143
            </div>
        </div>
        <div class="info-item">
            <div class="info-icon">
                <i class="fa-solid fa-phone"></i>
            </div>
            <div class="info-text">
                <strong>TRUNKLINE</strong><br>
                (+632) 8192-1147
            </div>
        </div>
    </div>
</div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h4> Links </h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="Gallery.php">Gallery</a></li>
                            <li><a href="about_us.php">About</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4> Location </h4>
                        <ul>
                            <li><a href="#"> Maysan Rd, Valenzuela, Philippines, 1440</a></li>
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
        <script src="./assets/js/fadeJs/fadeAbout_us.js"></script>
        <script src="./assets/js/fadeJs/fadeGallery.js"></script>
</body>
</html>