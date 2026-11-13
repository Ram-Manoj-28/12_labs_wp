<?php
session_start();
$name = htmlspecialchars($_SESSION['visitor_name'] ?? 'Guest', ENT_QUOTES, 'UTF-8');
$start = (int) ($_SESSION['start_time'] ?? time());
$duration = max(0, time() - $start);
$hours = intdiv($duration,3600); $minutes = intdiv($duration%3600,60); $seconds = $duration%60;
session_unset(); session_destroy();
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Session Completed</title><link rel="stylesheet" href="../assets/style.css">    <link rel="stylesheet" href="style.css">
</head><body><main class="container"><section class="hero"><span class="eyebrow">Session completed</span><h1>Thank you, <span><?= $name ?></span>!</h1><p class="lead">You have successfully logged out. Your session duration is shown below.</p></section><section class="card" style="max-width:600px"><div class="stat"><span class="eyebrow">Total usage duration</span><strong><?= sprintf('%02d:%02d:%02d',$hours,$minutes,$seconds) ?></strong><p>Hours : Minutes : Seconds</p></div><div class="actions"><a class="button" href="index.php">Start a new session</a><a class="button secondary" href="../index.html">All labs</a></div></section></main></body></html>