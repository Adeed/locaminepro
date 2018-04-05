<?php
    include("config.php");
    session_start();
   
    $user_check = $_SESSION['user-detail']['status'];
   
    $ses_sql = mysqli_query($db,"select * from users where status = '".$user_check."'");
   
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
        if($user_check == '0'){
            header("location:../index.php");
        } else{}
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

</head>
<body>
<?php include("header.php") ?>
<main>
<div class="container">
<?php
  $sql = "SELECT * FROM users";
  $results = mysqli_query($db,$sql);
?>  
<br> 
    <table>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Mine Power</th>
            <th>Account Balance</th>           
            <th>Deposits</th>
        </tr>
            <?php
               while ($row = mysqli_fetch_array($results)) {
?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['mine_pwr']; ?></td>
            <td><?php echo $row['accnt_blnc']; ?></td>
            <td><?php echo $row['deposits']; ?></td>
        </tr>
            <?php
               }

            ?>
    </table>  
    <?php
$transSql = "SELECT * FROM users";
$transResult = mysqli_query($db,$transSql);
?>
    <form action = "" method="post">
        <div class="fitem">
            <select name="userID">
                <option selected="" disabled="" hidden="">Select User ID
                <?php
                    while ($transRow = mysqli_fetch_array($transResult)) {
                ?>
                <option><?php echo $transRow['ID']; ?>
                <?php
                    }
                ?>
            </select>  
        </div> 
        <input style="width:200px;" name="amnt" placeholder="Add Daily Earning" step="0.01" min=0 type="number">
        <button class="btn green sf" type="submit">Add Earning</button>
    </form>
    <?php 
        // details sent frm form
        if(!empty($_POST['userID']) && !empty($_POST['amnt']) ){
            $userID = mysqli_real_escape_string($db,$_POST['userID']);     
            $amnt = mysqli_real_escape_string($db,$_POST['amnt']); 
            $date = date('Y/m/d'); 

            $query = mysqli_query($db, "INSERT INTO transactions (userID, transType, transDate, transAmnt, transStatus) VALUES('".$userID."', 'Earnings', '".$date."', '".$amnt."', 'Verified')");
            if($query){
                $sql = "SELECT * FROM users where ID = '".$userID."'";
                $result = mysqli_query($db,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $balance = $row['accnt_blnc'];
                $newBlnc = $amnt + $balance;
                $upquery = mysqli_query($db, "UPDATE users  SET accnt_blnc = '".$newBlnc."' where ID = '".$userID."' ");

                echo "<p>Earnings added.</p>";
            }
            else
            {
                echo "<p>Could not update Earnings, try again.</p>";    
            }         
        } else{
        echo "fill in the details";
        }
    ?>
</div>
</main>
</body>
</html>