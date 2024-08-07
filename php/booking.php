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
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'; ?>
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
    <?php include 'header.php'; ?>

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
                                <img src="../images/<?php echo htmlspecialchars($room['image_url']); ?>" alt="Room Image" class="room-image">
                                <div class="room-info">
                                    <h4 class="whiteTxt"><?php echo htmlspecialchars($room['name']); ?></h4>
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

                                    <!-- Payment Information Section -->
                                    <div class="form-group">
                                        <label for="card_name">Card holder Name</label>
                                        <input type="text" name="card_name" id="card_name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="card_number">Card Number</label>
                                        <input type="text" name="card_number" id="card_number" class="form-control" required pattern="\d{16}" title="Please enter a valid 16-digit card number">
                                    </div>
                                    <div class="form-group">
                                        <label for="card_expiry">Expiration Date</label>
                                        <input type="month" name="card_expiry" id="card_expiry" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="card_cvv">CVV</label>
                                        <input type="text" name="card_cvv" id="card_cvv" class="form-control" required pattern="\d{3}" title="Please enter a valid 3-digit CVV">
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
