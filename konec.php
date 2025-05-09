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

function calculateTotalPoints($player) {
    $totalPoints = 0;
    foreach ($player['rolls'] as $round) {
        $totalPoints += array_sum($round); // Sum all dice results for each round
    }
    return $totalPoints;
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

if ($_SESSION['current_round'] === $_SESSION['rounds']) {
    // Calculate the total points for each player
    $playersPoints = [];
    foreach ($_SESSION['players'] as $i => $player) {
        $playersPoints[$i] = [
            'name' => $player['name'],
            'points' => calculateTotalPoints($player)
        ];
    }

    // Sort players by points, descending order
    usort($playersPoints, function($a, $b) {
        return $b['points'] - $a['points']; // Sort in descending order
    });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GAMBLING</title>
    <link rel="stylesheet" href="style.css"> <!-- External CSS -->
</head>
<body>

    <div id="naslov">
        <h1>GAMBLING</h1>
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

        <?php if ($_SESSION['current_round'] === $_SESSION['rounds']): ?>
            <div class="podium">
                <?php foreach ($playersPoints as $index => $player): ?>
                    <div class="place <?php echo $index == 0 ? 'first' : ($index == 1 ? 'second' : 'third'); ?>">
                        <h2><?= $player['name'] ?></h2>
                        <p>Points: <?= $player['points'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
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
        <form action="konec.php" style="margin-left: 10px;">
            <input type="submit" id="gumbGremo" value="Back to Start" style="width: 150px;">
        </form>
    </div>

</body>
</html>
