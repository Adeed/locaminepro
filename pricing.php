<?php
       include('./bin/config.php');
       session_start();

       $user_check = $_SESSION['login_user'];

       $ses_sql = mysqli_query($db,"select * from users where username = '$user_check' ");

       $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

       if(!isset($_SESSION['login_user'])){
          header("location:./bin/sign-in.php");
       }else
       {
       }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noodp">
    <title>Power pricing – LocalMinePro</title>
    <meta name="description" content="LocalMinePro.com - The New Generation of Bitcoin Mining - Join us now!">
    <meta name="theme-color" content="#70cc78">
    <link rel="canonical" href="pricing.htm">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Encode+Sans:300,400,500,600,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
    <link rel="stylesheet" href="assets\styles\icon.css">
    <link rel="stylesheet" href="assets\styles\idealize.css">
    <link rel="stylesheet" href="assets\styles\base.css">
    <link rel="stylesheet" href="assets\styles\style.css">
    <link rel="stylesheet" href="assets\styles\responsive.css" media="(max-width: 1300px)">
</head>

<body>
    <header>
        <div id="top" class="container">
            <a href="index.htm" class="brand sf">
                <img src="assets\images\logo-36.png" width="250" height="80" alt="LocalMinePro Logo">
            </a>
        </div>
        <div id="menu">
            <div class="container">
                <ul class="left sf">
                    <li class="active">
                        <a href="index.php" class="sf-b">Home</a>
                    </li>
                    <li class="">
                        <a href="pricing.php" class="sf-b">Pricing</a>
                    </li>
                    <li class="">
                        <a href="affiliate.php" class="sf-b">Affiliate</a>
                    </li>
                    <li class="">
                        <a href="faq.php" class="sf-b">F.A.Q</a>
                    </li>
                    <li class="">
                        <a href="support.php" class="sf-b">Support</a>
                    </li>
                </ul>
                <ul class="right sf">
                    <?php
                  if (!isset($_SESSION['login_user']))
                  { ?>
                        <li>
                            <a class="sf-b red" href="./bin/sign-in.php">Login</a>
                        </li>
                        <li>
                            <a class="sf-b red" href="sign-up.php">Register</a>
                        </li>
                        <?php
                  } 
                  else
                  { ?>
                            <li>
                                <a class="sf-b red" href="dashboard.php">Dashboard</a>
                            </li>
                            <li>
                                <a class="sf-b red" href="transactions.php">transactions</a>
                            </li>
                            <li>
                                <a class="sf-b red"> Welcome
                                    <?php print_r($_SESSION['login_user']);  ?> </a>
                            </li>
                            <li>
                                <a class="sf-b red" href="bin/logout.php">Logout</a>
                            </li>
                            <?php
                  } 
                  ?>

                </ul>
            </div>
        </div>

        <div id="hero">
            <div class="container">
                <h1>Our Pricing.</h1>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <h2 class="text-center">Browse Through Our Packages</h2>

        <div class="flex space" style="margin-top: 80px">
            <div class="server-box">
                <h4 style="margin-bottom: 30px">Starter</h4>
                <hr>
                <h3>$100</h3>
                <div class="card-footer">
                        <h4>22 MH/S</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">4 Months Ethereum Mining *</li>
                        <li class="list-group-item">No maintenance fee</li>
                        <li class="list-group-item">No Electricity fee</li>
                        <li class="list-group-item"> Minimum Pay Out $50</li>
                        <li class="list-group-item">5% per Refreal</li>
                    </ul>
            </div>
            <div class="server-box">
                <h4 style="margin-bottom: 30px">Economy</h4>
                <hr>
                <h3>$200</h3>
                <div class="card-footer">
                        <h4>30 MH/S</h4>
                    </div>
                <ul class="list-group">
                    <li class="list-group-item">6 Months Ethereum Mining *</li>
                    <li class="list-group-item">No maintenance fee</li>
                    <li class="list-group-item">No Electricity fee</li>
                    <li class="list-group-item"> Minimum Pay Out $80</li>
                    <li class="list-group-item">7% per Refreal</li>
                </ul>
            </div>
            <div class="server-box">
                <h4 style="margin-bottom: 30px">Business</h4>
                <hr>
                <h3>$600</h3>
                <div class="card-footer">
                        <h4>50 MH/S</h4>
                    </div>
                <ul class="list-group">
                    <li class="list-group-item">10 Months Ethereum Mining *</li>
                    <li class="list-group-item">No maintenance fee</li>
                    <li class="list-group-item">No Electricity fee</li>
                    <li class="list-group-item"> Minimum Pay Out $150</li>
                    <li class="list-group-item">10% per Refreal</li>
                </ul>
            </div>
        </div>
        </div>
    </main>
    <script src="assets\scripts\script.js" async=""></script>
    <script id="parsing">console.log('Parsing: 0.103 s'); document.body.removeChild(document.getElementById('parsing'))</script>
</body>

</html>