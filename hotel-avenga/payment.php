<?php
    session_start();

    $booking_data = $_SESSION['booking_data'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="stylesheet" href="css/paystyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

        <style>
        body
        {
        	background-image:url("img/bg5.jpg");
        }
        </style>

        <script>
                function confirmPayment() {
                    // Display a thank you message
                    alert("Thank you for your payment!");

                    // Redirect to the home page
                    window.location.href = "index.php";
                }
        </script>

</head>
<body>
    <div class="container">
        <h1>Confirm Your Payment</h1>
        <div class="first-row">
            <div class="owner">
                <h3>Name on card</h3>
                <div class="input-field">
                    <input type="text" placeholder="name">
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="text" placeholder="123">
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field">
                    <input type="text" placeholder="0000 0000 0000 0000">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Expiration Date</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                    </select>
                    <select name="years" id="years">
                        <option value="2020">2023</option>
                        <option value="2019">2024</option>
                        <option value="2018">2025</option>
                        <option value="2017">2026</option>
                        <option value="2016">2027</option>
                        <option value="2015">2028</option>
                        <option value="2015">2029</option>
                        <option value="2015">2030</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="fourth-row">
            <h3>Card Type</h3>

            <label class="radio">
                <input type="radio" name="card" value="payment" checked>
                <span><img width="60" src="img/vi.png" /></span>
            </label>

            <label class="radio">
                <input type="radio" name="card" value="payment">
                <span><img width="60" src="img/mc.png" /></span>
            </label>

            <label class="radio">
                <input type="radio" name="card" value="payment">
                <span><img width="60" src="img/pp.png" /></span>
            </label>
        </div>

        <div>
            <h3>Total Amount: Rs. <?php echo $booking_data['total']; ?>/=</h3>
        </div>

        <a href="#" onclick="confirmPayment()">Confirm</a>
    </div>


    </body>
</html>