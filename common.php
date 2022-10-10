<!-- Christian Hart 001-68-3628 -->

<?php

// Identify the user in singles.txt
function userSearch($name) {
    // find user in singles.txt by $name, then assign variables to prefs
    $myfile = fopen("singles.txt", "r");
    while (! feof($myfile)) {
        $line = fgets($myfile);
        $params = explode(",",$line,7);
        if ($params[0] == $name) {
            //echo $params[0];
            return $params;
        }
    }
}

// Convert qualifying lines into match objects

function searchSingles($name, $sex, $age, $type, $os, $ageLow, $ageHigh) {
    $myfile = fopen("singles.txt", "r");

    //populate array with lines of singles.txt that qualify
    while (! feof($myfile)) {
        $line = fgets($myfile);
        $params = explode(",",$line,7);
        // compare personality types

        if ($params[1] != $sex &&       //Qualifications
            $params[2] > $ageLow &&
            $params[2] < $ageHigh &&
            $age >= $params[5] &&
            $age <= $params[6] &&
            $params[4] == $os &&
            typeComp($type,$params[3])
        ) {
            for($x = 0; $x < count($params); $x++) {    //Print matches
                echo $params[$x] . ", ";
            }
            echo "<br>";
        }
    }
}

    //output match objects as html divs


    //print $name;
    //searchSingles($name, $sex, $os, $type, $ageLow, $ageHigh);


function typeComp ($user,$match) {
    for ($x = 0; $x < strlen($user); $x++) {
        if ($user[$x] == $match[$x]) {
            return true;
        }
    }
    return false;

}