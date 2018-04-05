<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM users WHERE username ='$myusername' and pass ='$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      

      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
if($count == 1) {        
$_SESSION['login_user'] = $myusername;
$_SESSION['user-detail'] = $row;
header('Location: ../Dashboard.php');

}else {
$error = "Your Login Name or Password is invalid";
}

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta property="og:image" content="https://www.sierrahash.com/assets/images/og-image.jpg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noodp">
    <title>Sign In – Local Mine Pro</title>
    <meta name="description" content="LocalMinePro - The New Generation of Cloud Mining - Join us now!">
    <meta name="theme-color" content="#70cc78">
    <link rel="canonical" href="sign-in.htm">
    <link rel="shortcut icon" href="..\favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Encode+Sans:300,400,500,600,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
    <link rel="stylesheet" href="..\assets\styles\icon.css">
    <link rel="stylesheet" href="..\assets\styles\idealize.css">
    <link rel="stylesheet" href="..\assets\styles\base.css">
    <link rel="stylesheet" href="..\assets\styles\style.css">
    <link rel="stylesheet" href="..\assets\styles\responsive.css" media="(max-width: 1300px)">
    <script id="data" type="application/json">{"pricing":{"min_investment":0.001,"max_investment":25,"hashpower_price":2.5e-6,"invest_scaling":0.38,"roi_duration":10},"btc_price":{"usd":10820.07,"eur":9135.882824,"gbp":8069.564926,"rub":633385.25766,"cny":71575.444714,"inr":696116.453692},"site_name":"SierraHash","site_url":"https://www.sierrahash.com","ref_url":"https://www.sierrahash.com","g_analytics":"UA-xxx-2"}</script>

</head>

<body>
<?php include("header.php") ?>

    <main>
        <div class="container">
            <p style="width: 690px; margin-left: auto; margin-right: auto; text-align: center">Login to your personal user dashboard to keep an eye on your statistics and other account related things.</p>
            <div class="auth-input">
             <form action = "" method="post">
                    <input name="username" placeholder="Username" type="text" maxlength="20" autofocusrequired="">
                    
                    <input name="password" placeholder="Password" type="password" maxlength="255" spellcheck="false"
                            required="">
                        <input name="formsubmit" value="true" type="hidden">
                        <strong id="formerror"></strong>
                        <button class="btn green sf" type="submit">Sign in</button>

                        <div class="g-recaptcha" data-sitekey="6LelRjYUAAAAAKNNp6Lxz1b86RXIgriAarHrkoSs"
                            data-callback="submitForm" data-size="invisible" data-badge="inline" hidden=""></div>
                        <a class="btn grey sf" href="login-reset.htm">Forgot your password?</a>
                </form>
                <a href="sign-up.php" class="nav-link text-center">Not Registered?</a>
        </div>
        </div>
    </main>
    <script var data = JSON.parse(document.getElementById('data').innerHTML)></script>
    <script src="..\assets\scripts\script.js" async=""></script>
    <script>(function (i, s, o, g, r, a, m) { i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () { (i[r].q = i[r].q || []).push(arguments) }, i[r].l = 1 * new Date(); a = s.createElement(o), m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m) })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga'); ga('create', data.g_analytics, 'auto'); ga('send', 'pageview');</script>
    <script id="parsing">console.log('Parsing: 0.106 s'); document.body.removeChild(document.getElementById('parsing'))</script>
</body>

</html>