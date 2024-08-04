<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,500i,700|Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

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
                    <li class="has-children active">
                        <a href="rooms.php">Rooms</a>
                        <ul class="dropdown">
                            <li>
                                <a href="#">King Bedroom</a>
                            </li>
                            <li>
                                <a href="#">Queen &amp; Double Bedroom</a>
                            </li>
                            <li>
                                <a href="#">Le Voila Suite</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="myBooking.php">My Booking</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
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
                        <a href="#" id="darkModeToggle"><i class="fa-solid fa-moon" id="icon"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-user"></i></a>
                    </li>
                    <li>
                        <a href="log-out.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                    </li>
                </ul>
                <a href="#" class="d-block d-lg-none burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </nav>

    <main class="untree_co--site-main">

        <div class="untree_co--site-hero inner-page" style="background-image: url('images/Weather.webp')">
        </div>

        <div class="untree_co--site-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center" data-aos="fade-up">
                        <?php
                        $city = "Freetown";
                        $apiKey = "16701454f199922676fe4f367baf6e93";
                        $apiURL = "https://api.openweathermap.org/data/2.5/weather?q=$city&units=metric&appid=$apiKey";
                        $forecastURL = "https://api.openweathermap.org/data/2.5/forecast?q=$city&units=metric&appid=$apiKey";

                        // Fetch current weather data
                        $weatherData = json_decode(file_get_contents($apiURL), true);

                        // Fetch forecast data
                        $forecastData = json_decode(file_get_contents($forecastURL), true);

                        if ($weatherData['cod'] == 200) {
                            echo "<div class='weather-summary'>";
                            echo "<h2 class='whiteTxt'>Weather Information for " . $weatherData['name'] . ":</h2>";

                            echo "<div class='weather-main row'>";
                            echo "<div class='col text-center'>";
                            echo "<i class='fa-solid " . getWeatherIcon($weatherData['weather'][0]['icon']) . " ' style='font-size: 1rem;'></i>";
                            echo "<p class='' style='margin: 0; font-size: 1rem;'>" . round($weatherData['main']['temp']) . "°C</p>";
                            echo "</div>";

                            echo "<div class='col text-center'>";
                            echo "<i class='fa-solid " . getWeatherIcon($weatherData['weather'][0]['icon']) . " ' style='font-size: 1rem;'></i>";
                            echo "<p class='' style='margin: 0;'>" . ucfirst($weatherData['weather'][0]['description']) . "</p>";
                            echo "</div>";
                            echo "</div>";

                            echo "<div class='weather-details row mt-4'>";
                            echo "<div class='col-md-6 mb-3'>";
                            echo "<p class=''><i class='fa-solid fa-temperature-low' style='font-size: 1rem;'></i> Min: " . round($weatherData['main']['temp_min']) . "°C</p>";
                            echo "</div>";
                            echo "<div class='col-md-6 mb-3'>";
                            echo "<p class=''><i class='fa-solid fa-temperature-high' style='font-size: 1rem;'></i> Max: " . round($weatherData['main']['temp_max']) . "°C</p>";
                            echo "</div>";

                            echo "<div class='col-md-6 mb-3'>";
                            echo "<p class=''><i class='fa-solid fa-tint' style='font-size: 1rem;'></i> Humidity: " . $weatherData['main']['humidity'] . "%</p>";
                            echo "</div>";
                            echo "<div class='col-md-6 mb-3'>";
                            echo "<p class=''><i class='fa-solid fa-wind' style='font-size: 1rem;'></i> Wind: " . $weatherData['wind']['speed'] . " m/s</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";

                            // Display 7-day forecast
                            echo "<div class='weather-forecast mt-4'>";
                            echo "<h3 class=''>Weather Forecast</h3>";
                            echo "<div class='forecast-details row'>";

                            $dailyForecast = [];
                            foreach ($forecastData['list'] as $forecast) {
                                $date = date('Y-m-d', $forecast['dt']);
                                if (!isset($dailyForecast[$date])) {
                                    $dailyForecast[$date] = $forecast;
                                }
                            }

                            $days = ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu'];
                            $displayedDays = 0;
                            foreach ($dailyForecast as $day => $data) {
                                if ($displayedDays < 6) {
                                    echo "<div class='col text-center mb-3'>";
                                    echo "<p class=''>" . $days[$displayedDays] . "</p>";
                                    echo "<i class='fa-solid " . getWeatherIcon($data['weather'][0]['icon']) . " ' style='font-size: 1rem;'></i>";
                                    echo "<p class=''>" . round($data['main']['temp']) . "°C</p>";
                                    echo "</div>";
                                    $displayedDays++;
                                }
                            }

                            // Add "Data not available" for any missing day
                            for ($i = $displayedDays; $i < 6; $i++) {
                                echo "<div class='col text-center mb-3'>";
                                echo "<p class=''>" . $days[$i] . "</p>";
                                echo "<p class=''>Data not available</p>";
                                echo "</div>";
                            }

                            echo "</div>";
                            echo "</div>";
                        } else {
                            echo "<p class='text-danger'>Error: Unable to fetch weather data.</p>";
                        }

                        function getWeatherIcon($iconCode)
                        {
                            $icons = [
                                '01d' => 'fa-sun',
                                '01n' => 'fa-moon',
                                '02d' => 'fa-cloud-sun',
                                '02n' => 'fa-cloud-moon',
                                '03d' => 'fa-cloud',
                                '03n' => 'fa-cloud',
                                '04d' => 'fa-cloud',
                                '04n' => 'fa-cloud',
                                '09d' => 'fa-cloud-showers-heavy',
                                '09n' => 'fa-cloud-showers-heavy',
                                '10d' => 'fa-cloud-sun-rain',
                                '10n' => 'fa-cloud-moon-rain',
                                '11d' => 'fa-bolt',
                                '11n' => 'fa-bolt',
                                '13d' => 'fa-snowflake',
                                '13n' => 'fa-snowflake',
                                '50d' => 'fa-smog',
                                '50n' => 'fa-smog'
                            ];
                            return $icons[$iconCode] ?? 'fa-question-circle';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'specialRequest.php'; ?>
    </div>

    <?php include 'footer.php'; ?>
    <?php include 'searchWrapper.php'; ?>

    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/owl.carousel.min.js"></script>
    <script src="js/vendor/jarallax.min.js"></script>
    <script src="js/vendor/jarallax-element.min.js"></script>
    <script src="js/vendor/ofi.min.js"></script>
    <script src="js/vendor/aos.js"></script>
    <script src="js/vendor/jquery.lettering.js"></script>
    <script src="js/vendor/jquery.sticky.js"></script>
    <script src="js/vendor/TweenMax.min.js"></script>
    <script src="js/vendor/ScrollMagic.min.js"></script>
    <script src="js/vendor/scrollmagic.animation.gsap.min.js"></script>
    <script src="js/vendor/debug.addIndicators.min.js"></script>
    <script src="js/main.js" defer></script>
    <script src="js/darkmode.js" defer></script>
</body>
</html>
