<header>
<div id="top" class="container">
    <a href="index.php" class="brand sf">
        <img src="assets\images\logo-36.png" width="250" height="80" alt="SierraHash Logo">
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
      <li><a class="sf-b red" href="./bin/sign-up.php">Register</a></li>
      <?php
      } 
      else
      { ?>
      <li><a class="sf-b red" href="dashboard.php">Dashboard</a></li>
      <li><a class="sf-b red" href="transactions.php">Transactions</a></li>
        <li><a class="sf-b red"> Welcome <?php print_r($_SESSION['login_user']);  ?> </a></li>
        <li><a class="sf-b red" href="bin/logout.php">Logout</a></li>
      <?php
      } 
      ?>
          
        </ul>
    </div>
</div>


<div id="hero" class="home">
    <div class="container">
        <h1>Local Mine Pro. Cloud Mining. Made Simple.</h1>
        <a href="./bin/sign-up.php" class="btn green big sf-b">Get started now</a>
    </div>

    <?php
      if (!isset($_SESSION['login_user']))
      { ?>
     
      <?php
      } 
      else
      { ?>
      <?php include("components/user-stats.php") ?>
      <?php
      } 
      ?>
    
</div>
</header>
