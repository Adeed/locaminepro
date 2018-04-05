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
    <title>Contact & Support – LocalMinePro</title>
    <meta name="description" content="">
    <meta name="theme-color" content="#70cc78">
    <link rel="canonical" href="support.htm">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Encode+Sans:300,400,500,600,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
    <link rel="stylesheet" href="assets\styles\icon.css">
    <link rel="stylesheet" href="assets\styles\idealize.css">
    <link rel="stylesheet" href="assets\styles\base.css">
    <link rel="stylesheet" href="assets\styles\style.css">
    <link rel="stylesheet" href="assets\styles\responsive.css" media="(max-width: 1300px)">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script id="data" type="application/json">{"pricing":{"min_investment":0.001,"max_investment":25,"hashpower_price":2.5e-6,"invest_scaling":0.38,"roi_duration":10},"btc_price":{"usd":10820.07,"eur":9135.882824,"gbp":8069.564926,"rub":633385.25766,"cny":71575.444714,"inr":696116.453692},"site_name":"SierraHash","site_url":"https://www.sierrahash.com","ref_url":"https://www.sierrahash.com","g_analytics":"UA-xxx-2"}</script>
</head>

<body>
<?php include("header.php") ?>  
    <main>
        <div class="container">
            <h2>Contact</h2>
            <div class="flex center">
                <img style="margin-right: 40px" src="assets\images\email.png" width="127" height="81" alt="Email">
                <p style="width: 690px">Have any questions about or services or have an issue you would like to report, please contact us via our
                    mail address or via our email. please make sure to include your email address on any written letters
                    as we will not reply via mail.</p>
            </div>
            <h3 style="text-align: center; margin: 80px 0 50px">Contact Information</h3>
            <div class="flex center">
            <div  id="map"></div>  

                <p style="margin-left: 40px">LocalMinePro Ltd.
                    <br>
                    <strong>Email address: </strong>support@localminepro.com</p>
            </div>
        </div>
    </main>

    <script src="assets\scripts\map.js"></script>
    <script async defer 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnXPmwWrTZklncDw9zB4b7NudAIZwEB5g&callback=initMap"
    type="text/javascript"></script>
    <script var data = JSON.parse(document.getElementById('data').innerHTML)></script>
    <script src="assets\scripts\script.js" async=""></script>
    <script>(function (i, s, o, g, r, a, m) { i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () { (i[r].q = i[r].q || []).push(arguments) }, i[r].l = 1 * new Date(); a = s.createElement(o), m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m) })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga'); ga('create', data.g_analytics, 'auto'); ga('send', 'pageview');</script>
    <script id="parsing">console.log('Parsing: 0.106 s'); document.body.removeChild(document.getElementById('parsing'))</script>
</body>

</html>