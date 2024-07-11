
<?php

    include("db.php");

    session_start();

    $username = "guest";
     if(isset($_SESSION['user_data']['username'])){
        $username = $_SESSION['user_data']['username'];
     };

    # Gather booking data
    $title=$_SESSION['booking_data']['venue'];
    $content=$_SESSION['booking_data']['foodPackage'];
    $date=$_SESSION['booking_data']['date'];

    # Calculate booking costs
    if ($title=="Indoor") {
       $title_cost="50";
    }elseif ($title=="Outdoor") {
        $title_cost="100";
    }else{
        $title_cost="200";
    }
    if ($content=="1") {
        $content_cost="500";
    }elseif ($content="2") {
         $content_cost="1000";
    }
    $total=$title_cost+$content_cost;

    # Save booking data to database
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $query="INSERT INTO `reservation`(`username`, `date`, `venue`, `package`, `total`) VALUES ('$username','$date','$title','$content','$total')";

        $result = mysqli_query($con, $query);

        if($result) {
            $reservation_id = mysqli_insert_id($con);

            $select_query = "SELECT * FROM `reservation` WHERE `reservationID` = '$reservation_id'";

            $select_result = mysqli_query($con, $select_query);

            if ($select_result && mysqli_num_rows($select_result) > 0) {
                $booking_data = mysqli_fetch_assoc($select_result);

                $_SESSION['booking_data'] = $booking_data;

               header("location: payment.php");
            }
        }

        echo "<script type = 'text/javascript'> alert('Failed to save booking data!') </script>";
    }

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/booking-cost.css">

    <style>
    body
    {
    	background-image:url("img/1.jpg");
    }
    </style>

  <title>Booking</title>

</head>

<body>

<form action="#" method="POST">
    <span>Date </span>
    <input type="date" name="date" value="<?php  echo $date; ?>" readonly><br>

    <span>Venue : <?php  echo $title; ?></span>
    <input type="text" name="venue" value="Rs. <?php  echo $title_cost; ?>/=" readonly><br>

    <span>Package : <?php  echo $content; ?></span>
    <input type="text" name="foodPackage" value="Rs. <?php  echo $content_cost; ?>/=" readonly><br>

    <span>Total : <?php  ?></span>
    <input type="text" name="total" value="Rs. <?php  echo $total; ?>/=" readonly><br>

    <input type="submit" value="Pay">

</form>

</body>
</html>












