<?php
// Start the session and immediately destroy it to reset everything
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gambling Room</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="naslov">
        <h1>GAMBLING ROOM</h1>
    </div>
    

    <form action="igra.php" method="GET">
        <div id="osnovaOkno">
            <div class="osnova">
                <label for="fname1" class="imena">First name:</label><br>
                <input type="text" id="fname1" name="fname1" class="vnosnaPolja" required><br>
                <label for="lname1" class="imena">Last name:</label><br>
                <input type="text" id="lname1" name="lname1" class="vnosnaPolja" required><br><br>
            </div>

            <div class="osnova">
                <label for="fname2" class="imena">First name:</label><br>
                <input type="text" id="fname2" name="fname2" class="vnosnaPolja" required><br>
                <label for="lname2" class="imena">Last name:</label><br>
                <input type="text" id="lname2" name="lname2" class="vnosnaPolja" required><br><br>
            </div>

            <div class="osnova">
                <label for="fname3" class="imena">First name:</label><br>
                <input type="text" id="fname3" name="fname3" class="vnosnaPolja" required><br>
                <label for="lname3" class="imena">Last name:</label><br>
                <input type="text" id="lname3" name="lname3" class="vnosnaPolja" required><br><br>
            </div>
        </div>

        <div id="osnovaOkno">
            <div class="osnova">
                <label for="dice" class="imena">Number of Dice:</label><br>
                <select id="dice" name="dice" class="vnosnaPolja2">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select><br>

                <label for="rounds" class="imena">Number of Rounds:</label><br>
                <select id="rounds" name="rounds" class="vnosnaPolja2">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select><br><br>

                <input type="submit" id="gumbGremo" value="Start!">
            </div>
        </div>
    </form>
</body>
</html>
