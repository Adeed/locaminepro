<?php
       include('./bin/config.php');
       session_start();

       $user_check = $_SESSION['login_user'];

       $ses_sql = mysqli_query($db,"select * from users where username = '$user_check' ");

       $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

       if(!isset($_SESSION['login_user'])){
          
       }else
       {
       }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta property="og:image" content="https://www.sierrahash.com/assets/images/og-image.jpg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noodp">
    <title>LocalMinePro - Cloud Mining</title>
    <meta name="description" content="LocalMinePro.com - The New Generation of Cloud Mining - Join us now!">
    <meta name="theme-color" content="#70cc78">
    <link rel="canonical" href="index.htm">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Encode+Sans:300,400,500,600,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
    <link rel="stylesheet" href="assets\styles\icon.css">
    <link rel="stylesheet" href="assets\styles\idealize.css">
    <link rel="stylesheet" href="assets\styles\base.css">
    <link rel="stylesheet" href="assets\styles\style.css">
    <link rel="stylesheet" href="assets\styles\responsive.css" media="(max-width: 1300px)">
</head>

<body>

<?php include("header.php") ?>
    <main>
        <div class="container">
            <h2>Great Service. Low Price.</h2>
            <div class="flex center">
                <img src="assets\images\bitcoin.png" width="127" height="127" style="margin-right: 40px" alt="Bitcoin">
                <p style="width: 690px">Here at Local Mine we strive to provide you with the latest and greatest in cloud mining technology to
                    our customers whilest keeping our pricing as low as possible, we do this by keeping our overheads as
                    low as possible in all of our datacenters, this means we can put more mining hardware into our datacenters
                    whilest maintaining a low overhead price. More power for you, cheaper to run for us. With out 99.9% uptime
                    guarantee you will never go without mining. Ever.</p>
            </div>
            <h2>What we offer.</h2>
            <img class="ns sf" src="assets\images\offering.png" width="1120" height="450" alt="Our offerings">

            <?php
                if (!isset($_SESSION['login_user']))
                { ?>
                <h3 style="text-align: center; margin: 80px 0 50px">Become a member now and receive 150 GH/s mining power.</h3>
                <div class="promo-btns" style="text-align: center">
                    <a href="./bin/sign-up.php" class="btn green big sf">Sign up an account</a>
                    <a href="./bin/sign-in.php" class="btn grey big sf">Sign in to your account</a>
                </div>
                <?php
                } 
                else
                { ?>
                
                <?php
                } 
            ?>

        <div class="flex space" style="margin-top: 80px">
            <div class="server-box">
                    <h4 style="margin-bottom: 30px">Datacenter server status</h4>
                    <img class="ns sf" src="assets\images\server-health.png" width="463" height="360"
                        alt="Server health">
            </div>
        </div>
    </div>
</main>
    <script src="assets\scripts\script.js" async=""></script>
    <script id="parsing">console.log('Parsing: 0.121 s'); document.body.removeChild(document.getElementById('parsing'))</script>
</body>

</html>