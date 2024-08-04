<?php
session_start(); // Start the session
require_once 'config.php';
if (!isset($_SESSION['username']) && !isset($_GET['room_type_id'])) {
    header("Location: sign-in.php");
    exit();
}

try {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $room_type_id = isset($_GET['room_type_id']) ? $_GET['room_type_id'] : null;
    $stmt = $pdo->prepare("SELECT * FROM room_types WHERE id = :room_type_id");
    $stmt->execute(['room_type_id' => $room_type_id]);
    $room = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if (!$room) {
    echo "Room not found!";
    header("Location: rooms.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="DiamondCoastHotelLogo.png">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,500i,700|Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor/icomoon/style.css">
    <link rel="stylesheet" href="css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="css/vendor/aos.css">
    <link rel="stylesheet" href="css/vendor/animate.min.css">
    <link rel="stylesheet" href="css/vendor/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Diamond Coast Hotel - Booking</title>
    <style>
        .room-details-container {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        .room-image {
            max-width: 300px;
            height: auto;
            margin-right: 20px;
        }
        .room-info {
            flex: 2;
        }
        .booking-form-container {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 10px;
        }
        .booking-form-container .form-group {
            margin-right: 20px;
            flex: 1;
        }
        .booking-form-container .form-group:last-child {
            margin-right: 0;
        }
    </style>
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
        <div class="untree_co--site-main">
            <div class="untree_co--site-section">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-6 section-heading" data-aos="fade-up">
                            <h3 class="text-center">Booking</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="room-details-container">
                                <img src="images/<?php echo htmlspecialchars($room['image_url']); ?>" alt="Room Image" class="room-image">
                                <div class="room-info">
                                    <h4><?php echo htmlspecialchars($room['name']); ?></h4>
                                    <p><?php echo htmlspecialchars($room['description']); ?></p>
                                    <p>Price per night: <strong>$<?php echo htmlspecialchars($room['price']); ?></strong></p>
                                </div>
                            </div>
                            <div class="booking-form-container">
                                <form action="process_booking.php" method="post" class="booking-form" data-aos="fade-up" onsubmit="return validateDates()">
                                    <input type="hidden" name="room_type_id" value="<?php echo htmlspecialchars($room['id']); ?>">
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="total_price">Total Price ($)</label>
                                        <input type="text" name="total_price" id="total_price" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Book Now</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Additional content can go here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>

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
    <script src="js/main.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var startDateInput = document.getElementById("start_date");
        var endDateInput = document.getElementById("end_date");

        startDateInput.addEventListener('change', function () {
            validateDates();
            calculateTotalPrice();
        });

        endDateInput.addEventListener('change', function () {
            validateDates();
            calculateTotalPrice();
        });

        function validateDates() {
            var startDate = new Date(startDateInput.value);
            var endDate = new Date(endDateInput.value);

            if (startDate >= endDate) {
                endDateInput.setCustomValidity("End date must be after the start date.");
            } else if (startDate.getTime() === endDate.getTime()) {
                endDateInput.setCustomValidity("Start date and end date cannot be the same.");
            } else {
                endDateInput.setCustomValidity(""); // Clear the custom validity message
            }
        }

        function calculateTotalPrice() {
            var startDate = new Date(startDateInput.value);
            var endDate = new Date(endDateInput.value);
            if (startDate && endDate && startDate < endDate) {
                var diffTime = Math.abs(endDate - startDate);
                var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                var pricePerNight = <?php echo $room['price']; ?>;
                var totalPrice = diffDays * pricePerNight;
                document.getElementById("total_price").value = totalPrice;
            } else {
                document.getElementById("total_price").value = '';
            }
        }
    });
</script>

</body>
</html>
