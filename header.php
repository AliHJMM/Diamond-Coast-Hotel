<?php
// Function to set a cookie
function setCookiePHP($name, $value, $days) {
    $expires = 0;
    if ($days) {
        $expires = time() + ($days * 24 * 60 * 60); // Convert days to seconds
    }
    setcookie($name, $value, $expires, "/"); // Set the cookie for the whole site
}

// Function to get a cookie value by name
function getCookiePHP($name) {
    return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
}

// Check if a theme toggle request is made
if (isset($_GET['theme'])) {
    $theme = $_GET['theme'] === 'dark' ? 'dark' : 'light';
    setCookiePHP('theme', $theme, 7); // Set cookie for 7 days

    // Redirect back to the referring page to prevent repeated toggles on refresh
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit();
}

// Check the current theme from the cookie
$currentTheme = getCookiePHP('theme') ?: 'light';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Existing head content -->
    <link rel="stylesheet" href="styles.css"> <!-- Ensure you have CSS for both themes -->
</head>
<body class="<?php echo htmlspecialchars($currentTheme); ?>">

<header>
    <div id="untree_co--overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <nav class="untree_co--site-mobile-menu">
        <div class="close-wrap d-flex">
            <a href="#" class="d-flex ml-auto js-menu-toggle">
                <span class="close-label">Close</span>
                <div class="close-times">
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                </div>
            </a>
        </div>
        <div class="site-mobile-inner"></div>
    </nav>

    <div class="untree_co--site-wrap">
        <nav class="untree_co--site-nav js-sticky-nav">
            <div class="container d-flex align-items-center">
                <div class="logo-wrap">
                    <a href="home.php" class="untree_co--site-logo">Diamond Coast Hotel</a>
                </div>
                <div class="site-nav-ul-wrap text-center d-none d-lg-block">
                    <ul class="site-nav-ul js-clone-nav">
                        <li><a href="home.php">Home</a></li>
                        <li class="has-children">
                            <a href="rooms.php">Rooms</a>
                        </li>
                        <li><a href="myBooking.php">My Booking</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="weather.php">Weather</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="icons-wrap text-md-right">
                    <ul class="icons-top d-none d-lg-block">
                        <li class="mr-4">
                            <a href="#" class="js-search-toggle"><span class="fa fa-search"></span></a>
                        </li>
                        <li>
                            <a href="?theme=<?php echo $currentTheme === 'dark' ? 'light' : 'dark'; ?>" id="darkModeToggle">
                                <i class="fa-solid fa-<?php echo $currentTheme === 'dark' ? 'sun' : 'moon'; ?>" id="icon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="log-out.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                        </li>
                    </ul>
                    <!-- Mobile Toggle -->
                    <a href="#" class="d-block d-lg-none burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>
