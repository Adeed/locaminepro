<?php
       include('./bin/config.php');
       session_start();

       $user_check = $_SESSION['login_user'];

       $ses_sql = mysqli_query($db,"select * from users where username = '$user_check' ");

       $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

       if(!isset($_SESSION['login_user'])){
          header("location: ./bin/sign-in.php");
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
    <title>Dashboard-Local Mine Pro</title>
    <meta name="description" content="LocalMinePro - The New Generation of Cloud     Mining - Join us now!">
    <meta name="theme-color" content="#70cc78">
    <link rel="canonical" href="index.htm">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Encode+Sans:300,400,500,600,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
    <link rel="stylesheet" href="assets\styles\icon.css">
    <link rel="stylesheet" href="assets\styles\idealize.css">
    <link rel="stylesheet" href="assets\styles\base.css">
    <link rel="stylesheet" href="assets\styles\style.css">
    <link rel="stylesheet" href="assets\styles\responsive.css" media="(max-width: 1300px)">
    <script id="data" type="application/json">{"pricing":{"min_investment":0.001,"max_investment":25,"hashpower_price":2.5e-6,"invest_scaling":0.38,"roi_duration":10},"btc_price":{"usd":10820.07,"eur":9135.882824,"gbp":8069.564926,"rub":633385.25766,"cny":71575.444714,"inr":696116.453692},"site_name":"SierraHash","site_url":"https://www.sierrahash.com","ref_url":"https://www.sierrahash.com","g_analytics":"UA-xxx-2"}</script>
</head>

<body>
    <?php include("header.php") ?>
    <main>
        <div class="container">
            <h2 class="text-center">Your Dashboard</h2>
            <h3>LocalMinePro</h3> is a cloud hashing platform. This means you can participate in Cryptocurrency mining without
            maintenance or power expense.Higher you invest, more you earn.

            <h3>Investment Details</h3>
            We are offering registration for 4 months, 6 months and 10 months of validation period. The minimum investment we accept
            is $100, for which we would give you 22 MH/s for Ethereum cloud mining.
            <br>
            <br>
            <div style="text-align: center;">
                <h2>Statistics and account overview</h2>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Username:</th>
                            <td><?php print_r($_SESSION['user-detail']['username']);  ?></td>
                        </tr>

                        <tr>
                            <th>Account Balance:</th>
                            <td><?php print_r($_SESSION['user-detail']['accnt_blnc']);  ?> $</td>
                        </tr>
                        <tr>
                            <th>Total mining power:</th>
                            <td><?php print_r($_SESSION['user-detail']['mine_pwr']);  ?> MH/s</td>
                        </tr>

                        <tr>
                            <th>Amount withdrawn:</th>
                            <td><?php print_r($_SESSION['user-detail']['draw_amnt']);  ?> USD</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script>var data = JSON.parse(document.getElementById('data').innerHTML);</script>
    <script src="assets\scripts\script.js" async=""></script>
    <script>(function (i, s, o, g, r, a, m) { i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () { (i[r].q = i[r].q || []).push(arguments) }, i[r].l = 1 * new Date(); a = s.createElement(o), m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m) })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga'); ga('create', data.g_analytics, 'auto'); ga('send', 'pageview');</script>
    <script id="parsing">console.log('Parsing: 0.121 s'); document.body.removeChild(document.getElementById('parsing'))</script>
</body>

</html>