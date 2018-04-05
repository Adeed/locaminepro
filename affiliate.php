<?php
       include('./bin/config.php');
       session_start();

       $user_check = $_SESSION['login_user'];

       $ses_sql = mysqli_query($db,"select * from users where username = '$user_check' ");

       $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

       if(!isset($_SESSION['login_user'])){
          header("location:./bin/sign-in.php");
       } else {}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noodp">
    <title>Advertising and affiliate – Local Mine Pro</title>
    <meta name="description" content="">
    <meta name="theme-color" content="#70cc78">
    <link rel="canonical" href="affiliate.htm">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Encode+Sans:300,400,500,600,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
    <link rel="stylesheet" href="assets\styles\icon.css">
    <link rel="stylesheet" href="assets\styles\idealize.css">
    <link rel="stylesheet" href="assets\styles\base.css">
    <link rel="stylesheet" href="assets\styles\style.css">
    <link rel="stylesheet" href="assets\styles\responsive.css" media="(max-width: 1300px)">
    <script id="data" type="application/json">{"pricing":{"min_investment":0.001,"max_investment":25,"hashpower_price":2.5e-6,"invest_scaling":0.38,"roi_duration":10},"btc_price":{"usd":10820.07,"eur":9135.882824,"gbp":8069.564926,"rub":633385.25766,"cny":71575.444714,"inr":696116.453692},"site_name":"LocalMinePro","site_url":"https://www.LocalMinePro.com","ref_url":"https://www.LocalMinePro.com","g_analytics":"UA-xxx-2"}</script>
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
          <li><a class="sf-b red" href="./bin/sign-in.php">Login</a></li>
          <li><a class="sf-b red" href="sign-up.php">Register</a></li>
          <?php
          } 
          else
          { ?>
          <li><a class="sf-b red" href="dashboard.php">Dashboard</a></li>
            <li><a class="sf-b red"> Welcome <?php print_r($_SESSION['login_user']);  ?> </a></li>
            <li><a class="sf-b red" href="bin/logout.php">Logout</a></li>
          <?php
          } 
          ?>
              
            </ul>
        </div>
    </div>       
        <div id="hero">
            <div class="container">
                <h1>Affiliate</h1>
            </div>
        </div>
    </header>
    <main>
        
        <div class="container">
        <h2 style="text-align: center">Launching Soon</h2>
            <h2 style="text-align: center">Referrals And Commission</h2>
            <div class="flex center">
                <img src="assets\images\affi.png" width="127" height="122" style="margin-right: 40px" alt="Affiliate">
                <p style="width: 690px">You can earn more hashpower with LocalMinePro by refering your friends and family to us.</p>
            </div>
            
        </div>
    </main>
    <script var data = JSON.parse(document.getElementById('data').innerHTML)></script>
    <script src="assets\scripts\script.js" async=""></script>
    <script>(function (i, s, o, g, r, a, m) { i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () { (i[r].q = i[r].q || []).push(arguments) }, i[r].l = 1 * new Date(); a = s.createElement(o), m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m) })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga'); ga('create', data.g_analytics, 'auto'); ga('send', 'pageview');</script>
    <script id="parsing">console.log('Parsing: 0.106 s'); document.body.removeChild(document.getElementById('parsing'))</script>
</body>

</html>