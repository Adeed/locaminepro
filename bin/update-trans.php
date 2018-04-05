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
  $sql = "SELECT * FROM transactions where transStatus='Un-Verified'";
  $results = mysqli_query($db,$sql);
?>  
<br> 
    <table>
        <tr>
            <th>Transaction ID</th>
            <th>Date</th>
            <th>User Id</th>
            <th>User Name</th>
            <th>Transaction Amount</th>
            <th>Transaction Type</th>
            <th>Status</th>
        </tr>
            <?php
               while ($row = mysqli_fetch_array($results)) {
?>
        <tr>
            <td><?php echo $row['transID']; ?></td>
            <td><?php echo $row['transDate']; ?></td>
            <?php $UID = $row['userID']; ?>
<?php
  $secsql = "SELECT * FROM users where ID = '$UID'";
  $secresult = mysqli_query($db,$secsql);

    while ($secrow = mysqli_fetch_array($secresult)) {
?>
    <td><?php echo  $secrow['ID']; ?></td>
    <td><?php echo $secrow['username']; ?></td>
<?php
    }
?>
            <td><?php echo $row['transAmnt']; ?></td>
            <td><?php echo $row['transType']; ?></td>
            <td><?php echo $row['transStatus']; ?></td>
        </tr>
            <?php
               }

            ?>
    </table>   

<form action = "" method="post">
<?php
$transSql = "SELECT * FROM transactions";
$transResult = mysqli_query($db,$transSql);
?>
<div class="fitem">
    <select name="transID">
        <option selected="" disabled="" hidden="">Select Transaction ID
        <?php
               while ($transRow = mysqli_fetch_array($transResult)) {
?>
        <option><?php echo $transRow['transID']; ?>
       
        <?php
               }

            ?>
    </select>
</div> 

<button class="btn green sf" type="submit">update Transaction</button>
<?php 
// details sent frm form
if(!empty($_POST['transID'])){
    $transid = mysqli_real_escape_string($db,$_POST['transID']);     
        
      $query = mysqli_query($db, "UPDATE transactions  SET transStatus = 'Verified' where transID = '".$transid."' ");
      if($query){
          echo "<p>Transaction updated.</p>";
      }
      else
      {
          echo "<p>Could not update transaction, try again.</p>";    
      }         
} else{
  echo "fill in the details";
}
?>
</form>
    </div>
</main>

</body>

</html>