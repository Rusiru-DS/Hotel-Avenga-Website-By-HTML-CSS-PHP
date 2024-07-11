<?php
    include('db.php');
    session_start();

    $_SESSION['booking_data'] = [];

    # Save booking data to session data
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $_SESSION['booking_data']['venue']=$_POST['venue'];
        $_SESSION['booking_data']['foodPackage']=$_POST['foodPackage'];
        $_SESSION['booking_data']['date']=$_POST['date'];

        header("location: bookingcost.php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/booking1.css">
  <link rel="stylesheet" type="text/css" href="css/booking2.css">

    <style>
    body
    {
    	background-image:url("img/1.jpg");
    }
    </style>

  <title>Booking</title>

</head>

<body>

  <div class="topic">
    <h1>BOOK AS YOU WANT</h1>
  </div>

  <!-- Display the booking form -->
  <form id="bookingForm" class="container" action="#" method="POST">
    <label for="date">Select Date:</label>
    <input type="date" id="date" name="date" required><br><br>

    <label for="venue">Select Venue:</label>
    <select id="venue" name="venue" required>
      <option value="">-- Select Venue --</option>
      <option value="Indoor">Indoor</option>
      <option value="Outdoor">Outdoor</option>
      <option value="Both">Both</option>
    </select>
    <a id="galleryLink" href="gallery.php" target="_blank">View Venue Gallery</a><br><br>

    <label for="foodPackage">Select Food Package:</label>
    <select id="foodPackage" name="foodPackage" required>
      <option value="">-- Select Food Package --</option>
      <option value="1">Package 1</option>
      <option value="2">Package 2</option>
    </select><br><br>

    <input type="submit" value="Submit">
  </form>


</body>
</html>
