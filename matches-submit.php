<!-- Christian Hart 001-68-3628 -->
<!-- NerdLuv Match Query results -->

<!doctype html>
<html>
    <head>
        <title>NerdLuv Your Matches</title>
        <link rel="stylesheet" href="nerdluv.css">
    </head>
    <body>
        <img class="bannerarea" src="imgs/nerdluv-logo-alt.png"
             alt="Nerd Luv: Where Meek Geeks Meet" width="300">
        <img class="bannerarea" src="imgs/pixel-heart.png"
             alt="pixel heart logo" height="70">

        <?php include('common.php');
            // Check if name field is empty
            if ($_GET["name"] == "") {
                echo "<h1>Error! Invalid user input.</h1><br>";
                echo "<p>You're killing me, Smalls! Make sure you go back and actually 
                    enter a name this time. Try the keys in front of you. They're fun to 
                    press!</p>";
                echo "<a href='matches.php'><img src='imgs/pixel-heart.png' width='25px'>
                Back to match search</a>";
                exit;
            }
            // Find user in singles2.txt
            $userDetails = userSearch($_GET["name"]);
            // Find matches based on user preferences
            searchSingles($userDetails[0],$userDetails[1],$userDetails[2],$userDetails[3],
                $userDetails[4],$userDetails[5],$userDetails[6],$userDetails[7]);
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