<!-- Christian Hart 001-68-3628 -->

<!doctype html>
<html>
<head>
    <title>NerdLuv Signup Submission</title>
    <link rel="stylesheet" href="nerdluv.css">
</head>
<body>
    <img class="bannerarea" src="imgs/nerdluv-logo-alt.png" width="300">
    <img class="bannerarea" src="imgs/pixel-heart.png" height="70">

    <?php include("common.php");

    userAlready("$_POST[name]");
    checkUserInfo("$_POST[name]","$_POST[type]",
        "$_POST[ageLow]","$_POST[ageHigh]");
//    $prefs = "";
//    for ($x = 0; $x < count($_POST[pref]);$x++) {
//        $prefs += $_POST[pref[$x]];
//        echo "$prefs" . ", ";
//    }

    $myfile = fopen("singles.txt", "a") or die("Unable to open file!");
    $user = "$_POST[name]" . "," . "$_POST[gender]" . "," . "$_POST[age]" . "," .
        strtoupper("$_POST[type]") . "," . "$_POST[os]" . "," . "$_POST[ageLow]"
        . "," . "$_POST[ageHigh]" . "," . "$_POST[pref]" . " \n";
    fwrite($myfile, $user);
    fclose($myfile);

    echo "<h1>Thank you!</h1>";

    echo "<p>Welcome to NerdLuv, $_POST[name]!</p>";

    echo "<p>Now <a class='inline' href='matches.php'>log in to see your matches!</a></p>";
    ?>

    <br>
    <p>Results and page (C) Copyright NerdLuv Inc.</p>
    <a href="index.php">
        <img src="imgs/pixel-heart.png" width="25px">
        Back to Home Page</a>
    <br>
    <a href="https://www.w3.org/standards/webdesign/htmlcss">
        <img src="imgs/w3c_cred.jpg" alt="W3C HTML5 and CSS Documentation" width="200">
    </a>
</body>
</html>