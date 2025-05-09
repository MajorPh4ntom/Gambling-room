<?php
session_start();

function rollOneRound($dice) {
    $players = $_SESSION['players'];
    foreach ($players as $i => $player) {
        $singleRound = [];
        for ($d = 0; $d < $dice; $d++) {
            $singleRound[] = rand(1, 6);
        }
        $players[$i]['rolls'][] = $singleRound;
    }
    $_SESSION['players'] = $players;
}

// Set up the game from GET data, only if it's the first time coming to the page
if (isset($_GET['fname1']) && !isset($_SESSION['players'])) {
    $_SESSION['fname1'] = $_GET['fname1'];
    $_SESSION['lname1'] = $_GET['lname1'];
    $_SESSION['fname2'] = $_GET['fname2'];
    $_SESSION['lname2'] = $_GET['lname2'];
    $_SESSION['fname3'] = $_GET['fname3'];
    $_SESSION['lname3'] = $_GET['lname3'];
    $_SESSION['dice']   = (int)$_GET['dice'];
    $_SESSION['rounds'] = min((int)$_GET['rounds'], 5);
    $_SESSION['current_round'] = 0;

    $_SESSION['players'] = [
        ['name' => $_SESSION['fname1'] . ' ' . $_SESSION['lname1'], 'rolls' => []],
        ['name' => $_SESSION['fname2'] . ' ' . $_SESSION['lname2'], 'rolls' => []],
        ['name' => $_SESSION['fname3'] . ' ' . $_SESSION['lname3'], 'rolls' => []]
    ];
}



if (isset($_POST['reroll'])) {
    if ($_SESSION['current_round'] < $_SESSION['rounds']) {
        rollOneRound($_SESSION['dice']);
        $_SESSION['current_round']++;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Game Results</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .dice {
            margin-right: 5px;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div id="naslov">
        <h1>RESULTS</h1>
    </div>

    <div id="osnovaOkno">
        <?php if (!empty($_SESSION['players'])): ?>
            <?php foreach ($_SESSION['players'] as $player): ?>
                <div class="osnova">
                    <strong><?= htmlspecialchars($player['name']) ?></strong><br><br>
                    <?php foreach ($player['rolls'] as $index => $rolls): ?>
                        Round <?= $index + 1 ?>:
                        <?php foreach ($rolls as $die): ?>
                            <span class="dice">🎲<?= $die ?></span>
                        <?php endforeach; ?>
                        <br>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div id="osnovaOkno" style="margin-top: 20px;">
        <?php if ($_SESSION['current_round'] < $_SESSION['rounds']): ?>
            <form method="post">
                <input type="submit" id="gumbGremo" name="reroll" value="Roll (<?= $_SESSION['current_round'] + 1 ?> of <?= $_SESSION['rounds'] ?>)" style="width: 200px;">
            </form>
        <?php else: ?>
            <p style="font-weight: bold; color: green;">All rounds completed!</p>
        <?php endif; ?>
        <form action="index.php" style="margin-left: 10px;">
            <input type="submit" id="gumbGremo" value="Back to Start" style="width: 150px;">
        </form>
    </div>


    <script src="script.js"></script>
</body>
</html>
