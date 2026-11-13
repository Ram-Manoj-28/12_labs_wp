<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    if ($name !== '' && mb_strlen($name) <= 80) {
        session_regenerate_id(true);
        $_SESSION['visitor_name'] = $name;
        $_SESSION['start_time'] = time();
        header('Location: welcome.php'); exit;
    }
    $error = 'Please enter a valid name (maximum 80 characters).';
}
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>PHP Session Portal</title><link rel="stylesheet" href="../assets/style.css">    <link rel="stylesheet" href="style.css">
</head><body><header class="site-header"><div class="container"><a class="brand" href="../index.html">WP<span> / LAB 10</span></a><a class="back-link" href="../index.html">← All experiments</a></div></header><main class="container"><section class="hero"><span class="eyebrow">Experiment 10 · PHP sessions</span><h1>Session <span>Portal</span></h1><p class="lead">Enter your name to start a PHP session. Your name and session start time are stored on the server.</p></section><section class="card" style="max-width:620px"><div class="stat"><strong>01</strong><p>Enter your name</p><strong>02</strong><p>View your active session</p><strong>03</strong><p>Logout and see usage duration</p></div><?php if(!empty($error)): ?><p class="notice warning"><?= htmlspecialchars($error,ENT_QUOTES,'UTF-8') ?></p><?php endif; ?><form method="post"><label for="name">Your name</label><input id="name" name="name" maxlength="80" required placeholder="Enter your name"><div class="actions"><button type="submit">Start my session →</button></div></form></section></main></body></html>