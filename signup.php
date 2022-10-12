<!-- Christian Hart 001-68-3628 -->
<!-- NerdLuv Signup Page to register a new account -->

<!doctype html>
<html>
    <head>
        <title>NerdLuv Signup Page</title>
        <link rel="stylesheet" href="nerdluv.css">
    </head>
    <body>
        <img class="bannerarea" src="imgs/nerdluv-logo-alt.png"
             alt="Nerd Luv: Where Meek Geeks Meet" width="300">
        <img class="bannerarea" src="imgs/pixel-heart.png"
             alt="pixel heart logo" height="70">


    <form action="signup-submit.php" method="post">
            <fieldset>
                <legend>New User Signup:</legend>
                <label class="left" for="name">Name:</label>
                    <input type="text" size="16" name="name"><br>
                <label class="left" for="gender">Gender: </label>
                    <input type="radio" id="male" name="gender" value="M">
                    <label for="male">Male</label>
                    <input type="radio" id="female" checked="checked" name="gender" value="F">
                    <label for="female">Female</label>
                    <input type="radio" id="nonbinary" name="gender" value="N">
                    <label for="nonbinary">Non-Binary</label>
                <label class="left" for="age">Age:</label>
                    <input type="number" size="6" min="18" max="99" name="age" required><br>
                <label class="left" for="type">Personality Type:</label>
                    <input type="text" size="6" maxlength="4" name="type" required>
                        (<a href="https://www.humanmetrics.com/personality">
                            Don't know your type?</a>)
                <br>
                <label class="left" for="os">Favorite OS:</label>
                    <select name="os" required>
                        <option value="Windows">Windows</option>
                        <option value="Mac">Mac OS</option>
                        <option value="Linux">Linux</option>
                    </select><br>
                <label class="left" for="ageLow">Seeking Age:</label>
                    <input type="number" size="6" min="18" max="99" placeholder="min"
                           name="ageLow" required>
                    to <input type="number" size="6" min="18" max="99" placeholder="max"
                              name="ageHigh" required>
                <br>
                <label class="left" for="male">Looking For:</label>
                    <input type="checkbox" id="male" name="pref[]" value="M"/>Men
                    <input type="checkbox" id="female" name="pref[]" value="F"/>Women
                    <input type="checkbox" id="nonbinary" name="pref[]" value="N"/>Non-Binary
                <br>

                <!-- Implementation of profile pic upload: UNFINISHED -->
<!--                <label class="left" for="photo">Photo:</label>-->
<!--                    <input type="file" name="photo" accept="image/jpg,image/jpeg">-->
                <br>
                <input type="submit" value="Sign Up"><br>
            </fieldset>
        </form>

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