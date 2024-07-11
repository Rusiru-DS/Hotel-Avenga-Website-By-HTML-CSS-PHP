<?php

    include("db.php");

    session_start();

    $username = "guest";
     if(isset($_SESSION['user_data']['username'])){
        $username = $_SESSION['user_data']['username'];
     };

    # Save feedback to database
    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $feedback = $_POST['feedback'];

    $query = "INSERT INTO feedback (name, email, contact, feedback) VALUES ('$name', '$email', '$contact', '$feedback')";

     if (mysqli_query($con, $query)) {
      echo "<script type = 'text/javascript'> alert('Thank you! Your feedback has been submitted successfully.') </script>";

     } else {
         echo "Error: " . $query . "<br>" . mysqli_error($connect);
     }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Feedback</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta charset="UTF-8">
  <script src="https://kit.fontawesome.com/67c66657c7.js"></script>
  <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/feedback.css">

      <style>
      body
      {
      	background-image:url("img/feedback/image2.jpg");
      }
      </style>
</head>

<body>


  <section></section>
  <div class="container" id="feedback-form">
    <form method="POST" action="" id="feedback1">
      <h1>Give Your Feedback</h1>
      <div class="id">
        <input type="text" placeholder="Full Name" name="fullname" id="fullname" onkeyup="validateName()">
        <i class="far fa-user"></i>
        <span id="name-error"></span>
      </div>
      <div class="id">
        <input type="email" placeholder="Email-Address" name="email" id="email">
        <i class="far fa-envelope"></i>
        <span id="e-mail-error"></span>
      </div>
      <div class="id">
        <input type="text" placeholder="phone number" name="contact" id="contact">
        <i class="fa-solid fa-phone"></i>
        <span id="contact-error"></span>
      </div>
      <textarea placeholder="Enter your opinion here.." name="feedback" cols="15" rows="5" id="feedback"></textarea>
      <span id="feedback-error"></span>
      <button type="submit">Submit</button>
      <span id="submit-error"></span>
      <button type="reset">Clear</button>

      <br/><br/>
      <p><center>Go back to
              <a href="index.php" class="login-link">Home</a></center>
      </p>

    </form>
    <?php if (!empty($successMessage)) : ?>
    <div class="pop-up show">
      <p>
        <?php echo $successMessage; ?>
      </p>
    </div>
    <?php else: ?>
    <div class="pop-up">
      <p></p>
    </div>
    <?php endif; ?>
  </div>

  <script>
    var form = document.getElementById('feedback1');
    form.classList.add('hidden');
  </script>
  <script>
    setTimeout(function () {
      var popUp = document.querySelector('.pop-up');
      if (popUp) {
        popUp.classList.remove('show');
        form.classList.remove('hidden');
      }
    }, 3000);
  </script>
  </div>



</body>

</html>