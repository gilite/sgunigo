<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs ========== -->
  <meta charset="utf-8">
  <title>SGUniGo - One stop University application portal</title>

  <!-- Mobile Specific Metas ================ -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

  <!-- Favicon ============== -->
  <link rel="icon" type="image/png" href="../images/favicon.png">

  <!-- CSS ============== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../plugins/bootstrap/bootstrap.min.css">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="../plugins/fontawesome/css/all.min.css">
  <!-- Animation -->
  <link rel="stylesheet" href="../plugins/animate-css/animate.css">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="../plugins/slick/slick.css">
  <link rel="stylesheet" href="../plugins/slick/slick-theme.css">
  <!-- Colorbox -->
  <link rel="stylesheet" href="../plugins/colorbox/colorbox.css">
  <!-- Template styles-->
  <link rel="stylesheet" href="../css/style.css">
  <!-- JS -->
  <script src="../js/5paymentpage.js"></script>

<style>
    .container {
      padding: 16px;
    }

    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
      border: 1px solid #888;
      width: 80%; /* Could be more or less, depending on screen size */
    }

    /* Close Button */
    .close {
      position: absolute;
      right: 25px;
      top: 0;
      color: #000;
      font-size: 35px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: red;
      cursor: pointer;
    }

    /* Add Zoom Animation */
    .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
      from {-webkit-transform: scale(0)} 
      to {-webkit-transform: scale(1)}
    }
      
    @keyframes animatezoom {
      from {transform: scale(0)} 
      to {transform: scale(1)}
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }
      .closebtn {
        width: 100%;
      }
    }

</style>
</head>

<body onload = 'showModal()'>
<div class="container">
    <div id="modal1" class="modal">
        <div class="modal-content animate">
            <div class="container">
            <!-- Paypal API -->
            <div id="smart-button-container">
                <div style="text-align: center;">
                <div id="paypal-button-container"></div>
                </div>
            </div>
            <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=SGD" data-sdk-integration-source="button-factory"></script>
            <script>
                function initPayPalButton() {
                paypal.Buttons({
                    style: {
                    shape: 'pill',
                    color: 'gold',
                    layout: 'vertical',
                    label: 'paypal',
                    
                    },

                    createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{"description":"University Application Payment","amount":{"currency_code":"SGD","value":10}}]
                    });
                    },

                    onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        alert('Transaction completed by ' + details.payer.name.given_name + '!');
                    });
                    },

                    onError: function(err) {
                    console.log(err);
                    }
                }).render('#paypal-button-container');
                }
                initPayPalButton();
            </script>
            <button class="btn btn-secondary" type="submit" onclick="paymentback()">Back to Payment Page</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div id="modal2" class="modal">
        <div class="modal-content animate">

        <div class="container">
        
            <label for="uname"><b>Payment successfully made!</b></label>
            <p class="cd-signin-modal__message">Check your email inbox for email confirmation.</p>
            
            <button type="submit" onclick="back()">Back to User Page</button>
    
        </div>
        </div>
    </div>
</div>

</body>
</html>