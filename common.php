<!-- Christian Hart 001-68-3628 -->

<?php
// Identify the user in singles.txt
function userSearch($name) {
    // find user in singles.txt by $name, then convert info into string array
    $myfile = fopen("singles.txt", "r") or die("Unable to open file!");
    while (! feof($myfile)) {
        $line = fgets($myfile);
        $params = explode(",",$line,7);
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
function searchSingles($name, $sex, $age, $type, $os, $ageLow, $ageHigh) {
    $myfile = fopen("singles.txt", "r") or die("Unable to open file!");
    $matches = array();
    //populate array with lines of singles.txt that qualify
    while (! feof($myfile)) {
        $line = fgets($myfile);
        $params = explode(",",$line,7);
        // Qualifications
        if ($params[1] != $sex &&       // Opposite sex
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

// Compare user and match's Myers-Briggs type
function typeComp ($user,$match) {
    for ($x = 0; $x < strlen($user); $x++) {
        if ($user[$x] == $match[$x]) {
            return true;
        }
    }
    return false;
}
