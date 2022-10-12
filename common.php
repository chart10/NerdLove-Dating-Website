<!-- Christian Hart 001-68-3628 -->
<!-- common.php contains code that will be reused in other php files -->

<?php

// ------------------- signup-submit.php

// Signup Page: Verify that user input data is correct
function checkUserInfo ($name, $type, $ageLow, $ageHigh) {
    // Check that name field is not empty
    if ($name == "") {
        echo "<h1>Error! Invalid user input.</h1><br>";
        echo "<p>You're killing me, Smalls! Make sure you go back and actually 
                enter a name this time. Try the keys in front of you. They're fun to 
                press!</p><br>";
        echo "<a class='inline' href='signup.php'>
            <img src='imgs/pixel-heart.png' width='25px'>Back to sign up page</a>";
        exit;
    }
    // Check if personality type is formatted correctly
    if (preg_match('([i|e][n|s][f|t][j|p])i',$type) == 0) {
        echo "<h1>Error! Invalid user input.</h1><br>";
        echo "<p>Not so fast, Zorro! It looks like you entered your personality type
            incorrectly. Make sure you check out
            <a class='inline' href='https://www.humanmetrics.com/personality'>
            this page</a> for more info on your type.</p><br>";
        echo "<a class='inline' href='signup.php'>
            <img src='imgs/pixel-heart.png' width='25px'>Back to sign up page</a>";
        exit;
    }
    // Check if age range has been entered correctly
    if ($ageHigh < $ageLow) {
        echo "<h1>Error! Invalid user input.</h1><br>";
        echo "<p>You forgot how numbers work again, didn't you? Make sure you go back
            and enter a valid age range. Hint: the first number should be lower than
            the second.</p><br>";
        echo "<a class='inline' href='signup.php'>
            <img src='imgs/pixel-heart.png' width='25px'>Back to sign up page</a>";
        exit;
    }
}
// Signup Page: Check if user is already registered
function userAlready($name) {
    // find user in singles.txt by $name, then convert info into string array
    $myfile = fopen("singles2.txt", "r") or die("Unable to open file!");
    while (! feof($myfile)) {
        $line = fgets($myfile);
        $params = explode(",",$line,8);

        if (strcasecmp($params[0],$name) == 0) {
            echo "<h1>Error! $params[0] is aready registered.</h1>";
            echo "<p>It looks like you're already signed up. You can check your
                matches <a class='inline' href='matches.php'>here</a>!</p>";
            exit;
        }
    }
}

// ------------------- matches-submit.php

// Matches Page: Identify the user in singles.txt
function userSearch($name) {
    // find user in singles.txt by $name, then convert info into string array
    $myfile = fopen("singles2.txt", "r") or die("Unable to open file!");
    while (! feof($myfile)) {
        $line = fgets($myfile);
        $params = explode(",",$line,8);
        if (strcasecmp($params[0],$name) == 0) {
            //echo $params[0];
            echo "<h1>Welcome back, $params[0]!</h1>";
            echo "<h1>Here are your current matches.</h1>";
            return $params;
        }
    }
    echo "<h1>Great Scott! It's looks like you aren't in the NerdLuv database yet. 
        Why not create an account?</h1>";
    echo "<a href='signup.php'><img src='imgs/pixel-heart.png' width='25px'>
            Sign up for a new account</a>";
}

// Narrow user list down to qualifying matches
function searchSingles($name, $sex, $age, $type, $os, $ageLow, $ageHigh, $prefs) {
    $myfile = fopen("singles2.txt", "r") or die("Unable to open file!");
    $matches = array();
    //populate array with lines of singles.txt that qualify
    while (! feof($myfile)) {
        $line = fgets($myfile);
        $params = explode(",",$line,8);

//        echo "$params[1]<br>";
//        echo "$prefs<br>";
//        echo strpos("$prefs", "$params[1]");
        // Qualifications
        if ($params[0] != $name &&      // Do not match user with themselves
            strpos("$prefs","$params[1]") !== false &&
            strpos("$params[7]","$sex") !== false &&    // Preference match
            $params[2] >= $ageLow &&
            $params[2] <= $ageHigh &&   // Within user's age range
            $age >= $params[5] &&
            $age <= $params[6] &&       // User's within their age range
            $params[4] == $os &&        // Same OS preference
            typeComp($type,$params[3])  // Share at least one Myers-Briggs type
            ) {
                // Return array of qualifying matches
            $matches[] = $params;
        }
    }
    if (count($matches) == 0) {
        echo "Oops! It looks like you don't have any matches right now.
            Have you considered lowering your standards?";
    }
    foreach ($matches as $suitor) {
        matchTemplate($suitor);
    }
    return $matches;
}
// Convert qualifying lines into html match divs
function matchTemplate($matchedUser) {
    echo "<div class='match'>
        <img src='imgs/profile.png' alt='profile picture' width='200'>
        <p>$matchedUser[0]</p>
        <ul>
            <li><strong>Gender:</strong> $matchedUser[1]</li>
            <li><strong>Age:</strong> $matchedUser[2]</li>
            <li><strong>Type:</strong> $matchedUser[3]</li>
            <li><strong>OS:</strong> $matchedUser[4]</li>
        </ul>
    </div>";
}
// Compare user and match's Myers-Briggs type, array for-loop approach
// Used in searchSingles() in the qualifications if-block
function typeComp ($user,$match) {
    for ($x = 0; $x < strlen($user); $x++) {
        if ($user[$x] == $match[$x]) {
            return true;
        }
    }
    return false;
}