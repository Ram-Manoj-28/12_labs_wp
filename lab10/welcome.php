<?php
session_start();
if (empty($_SESSION['visitor_name']) || empty($_SESSION['start_time'])) { header('Location: index.php'); exit; }
$name = htmlspecialchars($_SESSION['visitor_name'], ENT_QUOTES, 'UTF-8');
$start = (int) $_SESSION['start_time'];
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Welcome</title><link rel="stylesheet" href="../assets/style.css">    <link rel="stylesheet" href="style.css">
</head><body><header class="site-header"><div class="container"><a class="brand" href="../index.html">WP<span> / LAB 10</span></a><span class="pill">Started: <?= date('h:i:s A',$start) ?></span></div></header><main class="container"><section class="hero"><span class="eyebrow">Active PHP session</span><h1>Hello, <span><?= $name ?></span>!</h1><p class="lead">Your session is active. The session start time is shown in the top-right corner.</p></section><section class="card" style="max-width:650px"><div class="stat"><span class="eyebrow">Session started at</span><strong><?= date('h:i:s A',$start) ?></strong><p><?= date('d F Y',$start) ?></p></div><form action="logout.php" method="post"><div class="actions"><button type="submit">Logout and finish session</button></div></form></section></main></body></html>