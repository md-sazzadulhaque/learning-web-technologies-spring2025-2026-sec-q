<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check remember me cookie
if (!isset($_SESSION['username']) && isset($_COOKIE['remember_user'])) {
    $username = $_COOKIE['remember_user'];
    if (isset($_SESSION['users'][$username])) {
        $_SESSION['username'] = $username;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>xCompany</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; font-size: 14px; }
        body { background: #f0f0f0; }
        .wrapper { width: 780px; margin: 30px auto; border: 1px solid #ccc; background: #fff; }
        .header { display: flex; justify-content: space-between; align-items: center; padding: 12px 18px; border-bottom: 1px solid #ccc; }
        .logo { font-size: 22px; font-weight: bold; color: #333; }
        .logo span { color: #2db52d; font-size: 28px; font-weight: 900; }
        .nav a { color: #7c5cbf; text-decoration: none; margin-left: 6px; }
        .nav a:hover { text-decoration: underline; }
        .content { padding: 24px; min-height: 260px; }
        .footer { border-top: 1px solid #ccc; text-align: center; padding: 10px; color: #555; }
        /* Layout for logged-in pages */
        .layout { display: flex; gap: 0; }
        .sidebar { width: 200px; border-right: 1px solid #ccc; padding: 16px; flex-shrink: 0; }
        .sidebar strong { display: block; margin-bottom: 8px; border-bottom: 1px solid #ccc; padding-bottom: 6px; }
        .sidebar ul { list-style: disc; padding-left: 18px; }
        .sidebar ul li { margin-bottom: 6px; }
        .sidebar ul li a { color: #7c5cbf; text-decoration: none; }
        .sidebar ul li a:hover { text-decoration: underline; }
        .main { flex: 1; padding: 16px; }
        /* Fieldset forms */
        fieldset { border: 1px solid #999; padding: 16px; width: 420px; }
        legend { font-weight: bold; padding: 0 6px; }
        .form-row { display: flex; align-items: center; margin-bottom: 10px; border-bottom: 1px solid #ddd; padding-bottom: 8px; }
        .form-row label { width: 150px; }
        .form-row input[type=text],
        .form-row input[type=email],
        .form-row input[type=password] { width: 170px; border: 1px solid #ccc; padding: 3px 5px; }
        .form-row .dob { display: flex; gap: 4px; align-items: center; }
        .form-row .dob input { width: 45px; border: 1px solid #ccc; padding: 3px 5px; }
        .form-row .dob .hint { color: #c00; font-style: italic; }
        .gender-group { border: 1px solid #999; padding: 8px 12px; margin-bottom: 10px; }
        .gender-group legend { font-size: 12px; }
        .btn { padding: 3px 12px; margin-right: 6px; cursor: pointer; }
        .msg-success { color: green; margin-bottom: 10px; }
        .msg-error { color: red; margin-bottom: 10px; }
        /* Profile view */
        .profile-box { border: 1px solid #999; padding: 16px; position: relative; }
        .profile-box legend { font-weight: bold; padding: 0 6px; }
        .profile-row { display: flex; margin-bottom: 8px; border-bottom: 1px solid #ddd; padding-bottom: 6px; }
        .profile-row .label { width: 120px; }
        .profile-pic { position: absolute; right: 20px; top: 20px; width: 80px; height: 80px; object-fit: cover; border-radius: 50%; }
        .profile-pic-default { position: absolute; right: 20px; top: 20px; font-size: 60px; color: #555; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="logo"><span>X</span>Company</div>
        <div class="nav">
            <?php if (isset($_SESSION['username'])): ?>
                Logged in as <a href="view_profile.php"><?= htmlspecialchars($_SESSION['username']) ?></a> | <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="index.php">Home</a> | <a href="login.php">Login</a> | <a href="register.php">Registration</a>
            <?php endif; ?>
        </div>
    </div>
