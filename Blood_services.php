<?php
// Start the session to check if the user is logged in
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Red cross Youth - Blood Services</title>
        <link rel="icon" href="./assets/images/RCY_LOGO.png" type="image/png">
        <link rel="stylesheet" href="./assets/css/about.css" />
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



        <div class="mv">
            <hr class="line">
            <h1>Red cross Youth - Plv</h1>
            <hr class="line">
        </div>
        <div class="mission-vision-container">
            <div class="our-mission">
                <h1>Blood Services</h1>
                <hr class="line">
                <p>Blood Services is a provider of networks for helping people with needs of blood. It is also in charge of blood letting programs inside the school and community. Blood services is also process blood request through online for those who are in need of blood bags</p>
            </div>
            <div class="mission-image">
                <img src="./assets/images/blood_service.jpg" alt="Blood_Services">
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



        <script src="./assets/js/nav.js"></script>
        <script src="./assets/js/fadeJs/fadeAbout_us.js"></script>
        <script src="./assets/js/fadeJs/fadeGallery.js"></script>


    </body>
</html>






