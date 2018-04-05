<?php
   include("config.php");
   session_start();
   
        $user_check = $_SESSION['login_user'];
   
        $ses_sql = mysqli_query($db,"select * from users where username = '$user_check' ");
   
        $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
        if(!isset($_SESSION['login_user'])){
            header("location: sign-in.php");
        } else {}
    $userid = $_SESSION['user-detail']['ID'];
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
<?php
  $sql = "SELECT * FROM users where  ID='".$userid."' ";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result)
?>  
    <?php include("header.php") ?>
    <main>
        <div class="container">
            <form action = "" method="post">             
                <input name="amnt" placeholder="Transaction amount" type="number">

                <button class="btn green sf" name="SubmitButton" type="submit">Withdraw Amount</button>
            </form>
<?php
if($row['accnt_blnc'] >= 50) {
    // details sent frm form
    if(isset($_POST['SubmitButton'])){    
        if(!empty($_POST['amnt'])){
        $date = date('Y/m/d');
        $amnt = mysqli_real_escape_string($db,$_POST['amnt']);

        if($_POST['amnt'] >= 50) {
            $registerquery = mysqli_query($db, "INSERT INTO transactions (userID, transType, transDate, transAmnt, transStatus) VALUES('".$userid."', 'Withdrawal', '".$date."', '".$amnt."', 'Un-Verified')");
            if($registerquery){

                $blnc = $row['accnt_blnc'];
                $draw = $row['draw_amnt'];
                $newdrawn = $draw + $amnt;
                $user_blnc = $blnc - $amnt;

                $sql = mysqli_query($db,"UPDATE users ". "SET accnt_blnc = '".$user_blnc."',draw_amnt = '".$newdrawn."' ". 
                    "WHERE ID = '".$userid."'" );
                
                echo "<p>Updated data successfully</p>\n";
                echo "<p>Transaction added, Please note that this transaction can take upto 2 days for verification.</p>";
            } else { echo "<p>Could not update transaction, try again.</p>"; } 
        } else { echo "<p>Account Balance should atleast be $50</p>"; }
        } else { echo "fill in the details"; }
    }
}
?>
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
                            <td><?php print_r($row['accnt_blnc']);  ?> $</td>
                        </tr>
                        <tr>
                            <th>Total mining power:</th>
                            <td><?php print_r($_SESSION['user-detail']['mine_pwr']);  ?> GH/s</td>
                        </tr>

                        <tr>
                            <th>Value of mining power:</th>
                            <td>0.00037500 BTC</td>
                        </tr>
                        <tr>
                            <th>Amount withdrawn:</th>
                            <td><?php print_r($_SESSION['user-detail']['draw_amnt']);  ?> BTC</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>