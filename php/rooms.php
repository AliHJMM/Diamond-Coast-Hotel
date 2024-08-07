<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: sign-in.php");
  exit();
}

require_once 'config.php';
$conn = getDBConnection();

// Fetch all room types from database
$sql = "SELECT * FROM room_types";
$result = $conn->query($sql);

$rooms = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $rooms[] = $row;
  }
}
$conn->close();

// Function to filter rooms based on search term
function filterRooms($rooms, $searchTerm) {
  $filteredRooms = [];
  foreach ($rooms as $room) {
    // Check if room name or any amenity contains the search term
    if (stripos($room['name'], $searchTerm) !== false ||
        stripos($room['amenities'], $searchTerm) !== false) {
      $filteredRooms[] = $room;
    }
  }
  return $filteredRooms;
}

// Handle search input
$searchTerm = isset($_GET['s']) ? $_GET['s'] : '';

// Filter rooms based on search term
if (!empty($searchTerm)) {
  $rooms = filterRooms($rooms, $searchTerm);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'links.php'; ?>
  <title>Diamond Coast Hotel</title>
</head>
<body>

  <?php include 'header.php'; ?>

  <main class="untree_co--site-main">

    <div class="untree_co--site-hero inner-page" style="background-image: url('../images/Rooms.jpg')">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center">
            <div class="site-hero-contents" data-aos="fade-up">
              <h1 class="hero-heading text-white">Our Rooms</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid px-md-0">
      <?php if (!empty($searchTerm)): ?>
      <?php endif; ?>

      <?php foreach ($rooms as $room) : ?>
        <div class="row no-gutters align-items-stretch room-animate site-section">
          <div class="col-md-7 <?php echo ($room['id'] % 2 == 0) ? 'order-md-2' : ''; ?> img-wrap" data-jarallax-element="-100">
            <div class="bg-image h-100" style="background-color: #efefef; background-image: url('../images/<?php echo htmlspecialchars($room['image_url']); ?>');"></div>
          </div>
          <div class="col-md-5">
            <div class="row justify-content-center">
              <div class="col-md-8 py-5">
                <h3 class="display-4 heading"><?php echo htmlspecialchars($room['name']); ?></h3>
                <div class="room-exerpt">
                  <div class="room-price mb-4 whiteTxt">$<?php echo htmlspecialchars($room['price']); ?><span class="per whiteTxt ">/night</span></div>
                  <p><?php echo htmlspecialchars($room['description']); ?></p>
                  <div class="row mt-5">
                    <div class="col-12">
                      <h3 class="mb-4">Amenities</h3>
                      <ul class="list-unstyled ul-check">
                        <?php
                        // Split amenities by newline and trim each line
                        $amenities = explode("\n", $room['amenities']);
                        foreach ($amenities as $amenity) : ?>
                          <li><?php echo htmlspecialchars(trim($amenity)); ?></li>
                        <?php endforeach; ?>
                      </ul>
                      <a href="booking.php?room_type_id=<?php echo $room["id"]; ?>" class="btn btn-primary mt-4">Book Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </main>

  <?php include 'footer.php'; ?>
  <?php include 'searchWrapper.php'; ?>

</body>
</html>
