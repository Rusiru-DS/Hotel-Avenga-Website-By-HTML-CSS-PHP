<!DOCTYPE html>
<html>
<head>
    <title>Feedback Preview</title>
    <link rel="stylesheet" type="text/css" href="css/preview.css">
      <style>
      body
      {
      	background-image:url("img/12.jpg");
      }
      </style>
</head>
<body>
    <div class="slideshow-container">
        <?php
        // Retrieve feedback data from the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hotel_avenga";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT feedback, name FROM feedback";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $feedback = $row["feedback"];
                $userName = $row["name"];

                // Display each feedback and the corresponding user name as a slide
                echo '<div class="mySlides">' . $feedback . '<br><span class="user-name">' . $userName . '</span></div>';
            }
        } else {
            echo "No feedbacks found.";
        }
        $conn->close();
        ?>
    </div>

    <script src="js/preview.js"></script>
</body>
</html>