<!-- Christian Hart 001-68-3628 -->

<html>
    <head>
        <title>NerdLuv Your Matches</title>
        <link rel="stylesheet" href="nerdluv.css">
    </head>
    <body>
        <img class="bannerarea" src="imgs/nerdluv-logo-alt.png" width="300">
        <img class="bannerarea" src="imgs/pixel-heart.png" height="70">
        <h1>Welcome back, <?php echo $_GET["name"]; ?>!</h1>
        <h1>Here are your current matches:</h1>

        <?php include("common.php"); ?>
        <?php
            //echo readfile("singles.txt");

            $userDetails = userSearch($_GET["name"]);
            //echo $userDetails;
//            for($x = 0; $x < count($userDetails); $x++) {
//                echo "<strong>$userDetails[$x]" . ". </strong>";
//            }
            echo "<br><br>";
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