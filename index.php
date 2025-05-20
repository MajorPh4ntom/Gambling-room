<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gambling Room</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div id="name">
        <h1>GAMBLING ROOM</h1>
    </div>
    

    <form id="gambling-form" action="igra.php" method="GET">
        <div id="basic-window">
            <div class="basic">
                <label for="fname1" class="names">First name:</label><br>
                <input type="text" id="fname1" name="fname1" class="input-fields" required><br>
                <label for="lname1" class="names">Last name:</label><br>
                <input type="text" id="lname1" name="lname1" class="input-fields" required><br><br>
            </div>

            <div class="basic">
                <label for="fname2" class="names">First name:</label><br>
                <input type="text" id="fname2" name="fname2" class="input-fields" required><br>
                <label for="lname2" class="names">Last name:</label><br>
                <input type="text" id="lname2" name="lname2" class="input-fields" required><br><br>
            </div>

            <div class="basic">
                <label for="fname3" class="names">First name:</label><br>
                <input type="text" id="fname3" name="fname3" class="input-fields" required><br>
                <label for="lname3" class="names">Last name:</label><br>
                <input type="text" id="lname3" name="lname3" class="input-fields" required><br><br>
            </div>
        </div>

        <div id="basic-window">
            <div class="basic">
                <label for="dice" class="names">Number of Dice:</label><br>
                <select id="dice" name="dice" class="input-fields2">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select><br>

                <label for="rounds" class="names">Number of Rounds:</label><br>
                <select id="rounds" name="rounds" class="input-fields2">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select><br><br>

                <input type="submit" id="button-go" value="Start!">
            </div>
        </div>
    </form>
    <script src="script.js"></script>
</body>
</html>
