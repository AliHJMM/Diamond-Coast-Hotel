<?php

session_start(); // Start the session
if (!isset($_SESSION['username']) && !isset($_GET['room_type_id'])) {
    header("Location: sign-in.php");
    exit();
}


require_once 'config.php';

$message1 = '';
$message2 = '';

function getAvailableRoomsByType($pdo, $roomTypeId, $startDate, $endDate) {
    $sql = "SELECT r.id
            FROM rooms r
            WHERE r.room_type_id = :room_type_id
            AND r.id NOT IN (
                SELECT b.room_id
                FROM bookings b
                WHERE b.start_date < :end_date AND b.end_date > :start_date
            )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'room_type_id' => $roomTypeId,
        'start_date' => $startDate,
        'end_date' => $endDate
    ]);
    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['room_type_id'], $_POST['start_date'], $_POST['end_date'], $_POST['total_price'])) {
        if (isset($_SESSION['username'])) {
            $room_type_id = $_POST['room_type_id'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $total_price = $_POST['total_price'];
            $username = $_SESSION['username'];

            $today = new DateTime();
            $start = new DateTime($start_date);
            $end = new DateTime($end_date);

            // Ensure start date is not in the past or today and end date is not before start date
            if ($start <= $today || $start == $end) {
                $message1 = "Invalid booking dates.";
                $message2 = "Booking cannot start today or in the past, and start date cannot be the same as end date.";
            } else {
                try {
                    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Fetch available rooms of the specified type
                    $availableRooms = getAvailableRoomsByType($pdo, $room_type_id, $start_date, $end_date);

                    if (!empty($availableRooms)) {
                        // Randomly select one of the available rooms
                        $room_id = $availableRooms[array_rand($availableRooms)];

                        // Get room price from the database
                        $stmt = $pdo->prepare("SELECT price FROM room_types WHERE id = :room_type_id");
                        $stmt->execute(['room_type_id' => $room_type_id]);
                        $roomType = $stmt->fetch(PDO::FETCH_ASSOC);

                        if ($roomType) {
                            $price_per_night = $roomType['price'];
                            $diff = $start->diff($end)->days;

                            $calculated_total_price = $diff * $price_per_night;

                            // Validate the total price
                            if ($calculated_total_price == $total_price) {
                                // Get user ID
                                $stmt = $pdo->prepare("SELECT user_id FROM users WHERE username = :username");
                                $stmt->execute(['username' => $username]);
                                $user_id = $stmt->fetchColumn();

                                // Insert booking
                                $sql = "INSERT INTO bookings (room_id, start_date, end_date, total_price, user_id) VALUES (:room_id, :start_date, :end_date, :total_price, :user_id)";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindParam(':room_id', $room_id);
                                $stmt->bindParam(':start_date', $start_date);
                                $stmt->bindParam(':end_date', $end_date);
                                $stmt->bindParam(':total_price', $total_price);
                                $stmt->bindParam(':user_id', $user_id);
                                $stmt->execute();

                                $message1 = "Thank you for booking with us!";
                                $message2 = "Room booked successfully!";
                            } else {
                                $message1 = "Price validation failed.";
                                $message2 = "The total price does not match the calculated price.";
                            }
                        } else {
                            $message1 = "Room type not found.";
                            $message2 = "The selected room type could not be found in the database.";
                        }
                    } else {
                        $message1 = "Sorry";
                        $message2 = "No rooms available for the selected dates.";
                    }

                    $pdo = null;
                } catch (PDOException $e) {
                    $message1 = "Database Error";
                    $message2 = $e->getMessage();
                }
            }
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'links.php'; ?>




  <title>Message Page</title>
</head>

<body>

  <div id="untree_co--overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div class="untree_co--site-wrap">
    <main class="untree_co--site-main">
      <div class="container text-center" style="height: 80vh; display: flex; align-items: center; justify-content: center;">
        <div>
          <h1 class="display-4 whiteTxt"><?php echo $message1?></h1>
          <p class="lead"><?php echo $message2?></p>
          <a href="home.php" class="btn btn-primary mt-4">Home</a>
        </div>
      </div>
    </main>
    <?php include 'footer.php'; ?>
  </div>
  <?php include 'searchWrapper.php'; ?>
</body>
</html>