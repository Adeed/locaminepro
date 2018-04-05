<?php
   include("config.php");
    // username and password sent from form 
    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['repassword']) && !empty($_POST['password'])){
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']);
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $country = mysqli_real_escape_string($db,$_POST['country']);



        $exists = "SELECT * from users where email ='$email'";
        if ($result=mysqli_query($db,$exists)){
          
          if(mysqli_num_rows($result) > 0){
            echo "User already registered";
          }
          else
            { 
              $registerquery = mysqli_query($db, "INSERT INTO users (username, pass, email, mine_pwr, accnt_blnc, draw_amnt, country) VALUES('".$username."', '".$password."', '".$email."', '0', '0', '0', '".$country."')");
              if($registerquery){
                echo "<p>Your account was successfully created. Please <a href=\"sign-in.php\">click here to login</a>.</p>";
              }
              else
                {
                  echo "<h1>Error</h1>";
                  echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
                }   
            }
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
    <title>Sign Up – Local Mine Pro</title>
    <meta name="description" content="LocalMinePro - The New Generation of Cloud Mining - Join us now!">
    <meta name="theme-color" content="#70cc78">
    <link rel="canonical" href="sign-up.htm">
    <link rel="shortcut icon" href="favicon.ico">
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
        <p style="width: 690px; text-align: center; margin-left: auto; margin-right: auto">Create your free account with SierraHash now and start mining instantly!</p>
        <div class="auth-input">
            <form action = "" method="post">
                <div>
                    <div class="fitem"><input name="username" placeholder="Username" type="text" maxlength="255" spellcheck="false" required></div>
                    <div class="fitem">
                        <select id="country" name="country">
                        <option selected="" disabled="" hidden="">Country<option>Afghanistan
                        <option>Åland Islands<option>Albania<option>Algeria<option>American Samoa
                        <option>Andorra<option>Angola<option>Anguilla<option>Antarctica
                        <option>Antigua and Barbuda<option>Argentina<option>Armenia<option>Aruba
                        <option>Australia<option>Austria<option>Azerbaijan<option>Bahamas
                                <option>Bahrain<option>Bangladesh<option>Barbados<option>Belarus
                                <option>Belgium<option>Belize<option>Benin <option>Bermuda
                                <option>Bhutan<option>Bolivia, Plurinational State of
                                <option>Bonaire, Sint Eustatius and Saba<option>Bosnia and Herzegovina
                                <option>Botswana<option>Bouvet Island<option>Brazil
                                <option>British Indian Ocean Territory<option>Brunei Darussalam
                                <option>Bulgaria<option>Burkina Faso<option>Burundi<option>Cambodia
                                <option>Cameroon<option>Canada<option>Cape Verde<option>Cayman Islands
                                <option>Central African Republic<option>Chad<option>Chile<option>China
                                <option>Christmas Island<option>Cocos (Keeling) Islands<option>Colombia
                                <option>Comoros<option>Congo<option>Congo, the Democratic Republic of the
                                <option>Cook Islands<option>Costa Rica<option>Côte d'Ivoire<option>Croatia
                                <option>Cuba<option>Czech Republic<option>Denmark<option>Djibouti<option>Dominica
                                <option>Dominican Republic<option>Ecuador<option>Egypt<option>El Salvador
                                <option>Equatorial Guinea<option>Eritrea<option>Estonia<option>Ethiopia
                                <option>Falkland Islands (Malvinas)<option>Faroe<option>Fiji<option>Finland
                                <option>France<option>French Guiana<option>French Polynesia<option>French Southern Territories
                                <option>Gabon<option>Gambia<option>Georgia<option>Germany<option>Ghana<option>Gibraltar
                                <option>Greece<option>Greenland<option>Grenada<option>Guadeloupe<option>Guam
                                <option>Guatemala<option>Guernsey<option>Guinea<option>Guinea-Bissau<option>Guyana
                                <option>Haiti<option>Heard Island and McDonald Islands<option>Holy See (Vatican City State)
                                <option>Honduras<option>Hong Kong<option>Hungary<option>Iceland<option>India
                                <option>Indonesia<option>Islamic Republic of Iran<option>Iraq<option>Ireland
                                <option>Isle of Man<option>Israel<option>Italy<option>Jamaica<option>Japan<option>Jersey
                                <option>Jordan<option>Kazakhstan<option>Kenya<option>Kiribati
                                <option>Korea, Democratic People's Republic of<option>Korea, Republic of
                                <option>Kuwait<option>Kyrgyzstan<option>Lao People's Democratic Republic
                                <option>Latvia<option>Lebanon<option>Lesotho<option>Liberia<option>Libya
                                <option>Liechtenstein<option>Lithuania<option>Luxembourg<option>Macao
                                <option>Macedonia, the former Yugoslav Republic of<option>Madagascar
                                <option>Malawi<option>Malaysia<option>Maldives<option>Mali<option>Malta
                                <option>Marshall Islands<option>Martinique<option>Mauritania
                                <option>Mauritius<option>Mayotte<option>Mexico<option>Micronesia, Federated States of
                                <option>Moldova, Republic of<option>Monaco<option>Mongolia
                                <option>Montenegro<option>Montserrat<option>Morocco<option>Mozambique
                                <option>Myanmar<option>Namibia<option>Nauru<option>Nepal
                                <option>Netherlands<option>NewCaledonia<option>NewZealand<option>Nicaragua<option>Niger<option>Nigeria
                                <option>Niue<option>Norfolk Island<option>Northern MarianaIslands<option>Norway<option>Oman
                                <option>Pakistan<option>Palau<option>Palestinian Territory, Occupied
                                <option>Panama<option>Papua NewGuinea<option>Paraguay<option>Peru
                                <option>Philippines<option>Pitcairn<option>Poland<option>Portugal
                                <option>Puerto Ric<option>Qatar<option>Réunion<option>Romania
                                <option>Russian Federation<option>Rwanda<option>Saint Barthélemy
                                <option>Saint Helena, Ascension and Tristan da Cunha
                                <option>Saint Kitts and Nevis<option>Saint Lucia
                                <option>Saint Martin (French part)<option>Saint Pierre and Miquelon
                                <option>Saint Vincent and the Grenadines<option>Samoa
                                <option>San Marino
                                <option>Sao Tome and Principe
                                <option>Saudi Arabia
                                <option>Senegal<option>Serbia
                                <option>Seychelles<option>Sierra Leone
                                <option>Singapore                                <option>Sint
                                Maarten
                                (Dutch
                                part)
                                <option>Slovakia                                <option>Slovenia
                                <option>Solomon                                Islands
                                <option>Somalia                                <option>South
                                Africa
                                <option>South                                Georgia
                                and
                                the
                                South
                                Sandwich
                                Islands
                                <option>South                                Sudan                                <option>Spain
                                <option>Sri                                Lanka
                                <option>Sudan                                <option>Suriname
                                <option>Svalbard                                and
                                Jan
                                Mayen
                                <option>Swaziland                                <option>Sweden
                                <option>Switzerland                                <option>Syrian
                                Arab
                                Republic
                                <option>Taiwan,
                                Province
                                of
                                China
                                <option>Tajikistan
                                <option>Tanzania,
                                United
                                Republic
                                of
                                <option>Thailand
                                <option>Timor-Leste
                                <option>Togo
                                <option>Tokelau
                                <option>Tonga
                                <option>Trinidad and Tobago
                                <option>Tunisia
                                <option>Turkey
                                <option>Turkmenistan
                                <option>Turks and Caicos Islands
                                <option>Tuvalu
                                <option>Uganda
                                <option>Ukraine
                                <option>United Arab Emirates
                                <option>United
                                Kingdom
                                <option>United
                                States
                                <option>United
                                States
                                Minor
                                Outlying
                                Islands
                                <option>Uruguay
                                <option>Uzbekistan
                                <option>Vanuatu
                                <option>Venezuela,
                                Bolivarian
                                Republic
                                of
                                <option>Viet
                                Nam
                                <option>Virgin
                                Islands,
                                British
                                <option>Virgin
                                Islands,
                                U.S.
                                <option>Wallis and
                                Futuna
                                <option>Western
                                Sahara
                                <option>Yemen                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <option>Zambia                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <option>Zimbabwe</select>
                </div>
                <div class="fitem"><input name="email" placeholder="E-Mail address" type="email" maxlength="255" spellcheck="false" required=""></div>
                <div class="fitem"><input name="password" placeholder="Password" class="password" type="password" maxlength="255" spellcheck="false" required=""></div>
                <div class="fitem"><input name="repassword" placeholder="Re-type Password" class="password" type="password" maxlength="255" spellcheck="false" required=""></div>
                   
                <strong id="formerror"></strong>
                <button class="btn green sf" type="submit">Sign up</button>
            </form>
        </div>
    </div>
</main>
    <script var data = JSON.parse(document.getElementById('data').innerHTML></script>
    <script src="..\assets\scripts\script.js" async=""></script>
    <script>(function (i, s, o, g, r, a, m) { i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () { (i[r].q = i[r].q || []).push(arguments) }, i[r].l = 1 * new Date(); a = s.createElement(o), m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m) })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga'); ga('create', data.g_analytics, 'auto'); ga('send', 'pageview');</script>
    <script id="parsing">console.log('Parsing: 0.105 s'); document.body.removeChild(document.getElementById('parsing'))</script>
</body>

</html>