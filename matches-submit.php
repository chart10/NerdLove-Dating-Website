<!-- Christian Hart 001-68-3628 -->

<html>
    <head>
        <title>NerdLuv Your Matches</title>
        <link rel="stylesheet" href="nerdluv.css">
    </head>
    <body>
        <img class="bannerarea" src="imgs/nerdluv-logo-alt.png" width="300">
        <img class="bannerarea" src="imgs/pixel-heart.png" height="70">

        <?php include("common.php");
        if ($_GET["name"] == "") {
            echo "<h1>You're killing me, Smalls! Make sure you go back and actually 
                enter a name this time. Try the keys in front of you. They're fun to 
                press!</h1>";
            exit;
        }
        $userDetails = userSearch($_GET["name"]);
            searchSingles($userDetails[0],$userDetails[1],$userDetails[2],$userDetails[3],
                $userDetails[4],$userDetails[5],$userDetails[6]);

        ?>
        <!-- If current matches == 0, return this string:
            "<p>Oops! It looks like you don't have any matches right now.</p>"
            "<p>Have you considered lowering your standards?</p>" -->

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