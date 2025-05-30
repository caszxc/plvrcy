<?php
// Start the session to check if the user is logged in
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Red cross Youth</title>
        <link rel="icon" href="./assets/images/RCY_LOGO.png" type="image/png">
        <link rel="stylesheet" href="./assets/css/sts.css" />
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



        <div class="meetourteam">
            <hr class="line">
            <h1>Meet Our Team</h1>
            <hr class="line">

        <br>
            <div class="container">
              <div class="card">
                <div class="imgBox">
                  <img src="./assets/profile/Ayson.jpg" alt="member">
                </div>
                <div class="uper">
                  <div class="name">Michael Onyl Ayson</div>
                </div>
                <div class="lower">
                  <div class="post">DATABASE</div>
                  <div class="sci">
                    <a href="https://www.facebook.com/miksa17" target="_blank">
                      <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/ownil17/" target="_blank">
                      <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="" target="_blank">
                      <i class="fa-brands fa-x-twitter"></i>
                    </a>
                  </div>
                </div>
              </div>


              <div class="card">
                <div class="imgBox">
                    <img src="./assets/profile/Castro.jpg" alt="member">
                </div>
                  <div class="uper">
                    <div class="name">John Kenneth Castro</div>
                  </div>
                  <div class="lower">
                    <div class="post">DATABASE/BACK END DEVELOPER</div>
                    <div class="sci">
                      <a href="https://www.facebook.com/CastroJohnKenneth.17">
                        <i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/im_caszxc/" target="_blank">
                          <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="" target="_blank">
                          <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    </div>
                  </div>
              </div>


              <div class="card">
                <div class="imgBox">
                    <img src="./assets/profile/Ignacio.jpg" alt="member">
                </div>
                  <div class="uper">
                    <div class="name">Mark Elezar Ignacio</div>
                  </div>
                  <div class="lower">
                    <div class="post">FRONT/BACK END DEVELOPER</div>
                    <div class="sci">
                      <a href="https://www.facebook.com/MarkieeIgnacioooo/friends">
                      <i class="fa-brands fa-facebook"></i></a>
                      <a href="https://www.instagram.com/markelezar/" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                      </a>
                      <a href="" target="_blank">
                        <i class="fa-brands fa-x-twitter"></i>
                      </a>
                    </div>
                  </div>
              </div>


              <div class="card">
                <div class="imgBox">
                    <img src="./assets/profile/Pe.jpg" alt="member">
                </div>
                  <div class="uper">
                    <div class="name">Dheyvid Kyle Pe</div>
                  </div>
                  <div class="lower">
                    <div class="post">UX/UI DESIGN</div>
                    <div class="sci">
                      <a href="https://www.facebook.com/dheyvidkyle.pe"></a>
                      <i class="fa-brands fa-facebook"></i>
                      <a href="https://www.instagram.com/dheyvid_kyle/" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                      </a>
                      <a href="" target="_blank">
                        <i class="fa-brands fa-x-twitter"></i>
                      </a>
                    </div>
                  </div>
              </div>


              <div class="card">
                <div class="imgBox">
                    <img src="./assets/profile/Rome.jpg" alt="member">
                </div>
                  <div class="uper">
                    <div class="name">Ray Gerald Rome</div>
                  </div>
                  <div class="lower">
                    <div class="post">UX/UI DESIGN</div>
                    <div class="sci">
                      <a href="https://www.facebook.com/raygerald.rome">
                      <i class="fa-brands fa-facebook"></i></a>
                      <a href="https://www.instagram.com/eggie_egshakj/" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                      </a>
                      <a href="" target="_blank">
                        <i class="fa-brands fa-x-twitter"></i>
                      </a>
                    </div>
                  </div>
              </div>


              <div class="card">
                <div class="imgBox">
                    <img src="./assets/profile/Vito_Cruz.jpg" alt="member">
                </div>
                  <div class="uper">
                    <div class="name">John Paul Vito Cruz</div>
                  </div>
                  <div class="lower">
                    <div class="post">DATABASE/BACKEND DEVELOPER</div>
                    <div class="sci">
                      <a href="https://www.facebook.com/johnpaul.vitocruz.92">
                      <i class="fa-brands fa-facebook"></i></a>
                      <a href="https://www.instagram.com/viiittttooooo/" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                      </a>
                      <a href="" target="_blank">
                        <i class="fa-brands fa-x-twitter"></i>
                      </a>
                    </div>
                  </div>
              </div>
            </div>    
            </div>



            <script src="./assets/js/nav.js"></script>
            <script src="./assets/js/fadeJs/fadeAbout_us.js"></script>
            <script src="./assets/js/fadeJs/fadeGallery.js"></script>

    </body>
</html>