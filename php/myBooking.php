<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: sign-in.php");
    exit();
}

$username = $_SESSION['username'];

try {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT b.id, rt.name AS room_name, rt.description, rt.image_url, r.room_number, b.start_date, b.end_date, b.total_price 
                           FROM bookings b 
                           JOIN rooms r ON b.room_id = r.id 
                           JOIN room_types rt ON r.room_type_id = rt.id 
                           JOIN users u ON b.user_id = u.user_id 
                           WHERE u.username = :username");
    $stmt->execute(['username' => $username]);
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'; ?>
    <title>Diamond Coast Hotel - My Bookings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .booking-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .room-image {
            flex-shrink: 0;
            margin-left: 20px;
        }

        .booking-details {
            flex-grow: 1;
        }

        .alert-bottom {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0;
            z-index: 1030; /* Ensure the alert is on top of other content */
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <div class="untree_co--site-main">
            <div class="untree_co--site-section">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-6 section-heading" data-aos="fade-up">
                            <h3 class="text-center">My Bookings</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <?php if (empty($bookings)): ?>
                                <p class="text-center">You have no bookings yet. <br> <a href="rooms.php" class="btn btn-primary mt-4">View Rooms</a></p>
                                
                            <?php else: ?>
                                <div class="booking-list">
                                    <?php foreach ($bookings as $booking): ?>
                                        <div class="booking-item" data-aos="fade-up">
                                            <div class="booking-details">
                                                <h4 class="whiteTxt"><?php echo htmlspecialchars($booking['room_name']); ?> - Room Number:  <?php echo htmlspecialchars($booking['room_number']); ?></h4>
                                                <p><?php echo htmlspecialchars($booking['description']); ?></p>
                                                <p><strong>Check-in:</strong> <?php echo htmlspecialchars($booking['start_date']); ?></p>
                                                <p><strong>Check-out:</strong> <?php echo htmlspecialchars($booking['end_date']); ?></p>
                                                <p><strong>Total Price:</strong> $<?php echo htmlspecialchars($booking['total_price']); ?></p>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#cancelModal-<?php echo $booking['id']; ?>">Cancel Booking</button>
                                            </div>
                                            <div class="room-image">
                                                <img src="../images/<?php echo htmlspecialchars($booking['image_url']); ?>" alt="<?php echo htmlspecialchars($booking['room_name']); ?>" style="width: 150px; height: auto;">
                                            </div>
                                        </div>

                                        <!-- Cancel Booking Modal -->
                                        <div class="modal fade" id="cancelModal-<?php echo $booking['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel-<?php echo $booking['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="cancelModalLabel-<?php echo $booking['id']; ?>">Cancel Booking</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: black !important;">
                                                        Are you sure you want to cancel your booking for <strong><?php echo htmlspecialchars($booking['room_name']); ?></strong>? Please note that the money will not be refunded.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="cancel_booking.php">
                                                            <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Confirm Cancellation</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Cancel Booking Modal -->

                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include 'footer.php'; ?>
    <?php include 'searchWrapper.php'; ?>

    <!-- Alert for deletion confirmation -->
    <?php if (isset($_GET['status']) && $_GET['status'] === 'deleted'): ?>
        <div class="alert alert-success alert-bottom alert-dismissible fade show" role="alert">
            Your booking has been successfully cancelled.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
        <div class="alert alert-danger alert-bottom alert-dismissible fade show" role="alert">
            There was an error while processing your request. Please try again later.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
