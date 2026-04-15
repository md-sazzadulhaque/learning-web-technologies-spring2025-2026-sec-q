<?php
require 'auth_guard.php';

$error   = '';
$success = '';
$uname   = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current = $_POST['current_password'] ?? '';
    $new     = $_POST['new_password'] ?? '';
    $retype  = $_POST['retype_password'] ?? '';

    if (!$current || !$new || !$retype) {
        $error = 'All fields are required.';
    } elseif (!password_verify($current, $_SESSION['users'][$uname]['password'])) {
        $error = 'Current password is incorrect.';
    } elseif ($new !== $retype) {
        $error = 'New passwords do not match.';
    } elseif (strlen($new) < 4) {
        $error = 'New password must be at least 4 characters.';
    } else {
        $_SESSION['users'][$uname]['password'] = password_hash($new, PASSWORD_DEFAULT);
        $success = 'Password changed successfully.';
    }
}

require 'header.php';
?>
    <div class="content">
        <div class="layout">
            <?php require 'sidebar.php'; ?>
            <div class="main">
                <?php if ($error): ?><p class="msg-error"><?= $error ?></p><?php endif; ?>
                <?php if ($success): ?><p class="msg-success"><?= $success ?></p><?php endif; ?>
                <form method="post">
                    <fieldset>
                        <legend>CHANGE PASSWORD</legend>
                        <div class="form-row">
                            <label>Current Password</label>
                            <span>:</span>&nbsp;<input type="password" name="current_password">
                        </div>
                        <div class="form-row" style="color:green;">
                            <label>New Password</label>
                            <span>:</span>&nbsp;<input type="password" name="new_password">
                        </div>
                        <div class="form-row" style="color:red;">
                            <label>Retype New Password :</label>
                            <input type="password" name="retype_password">
                        </div>
                        <hr style="margin:8px 0;">
                        <button class="btn" type="submit">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>
