<?php
require 'header.php';

$error   = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    if (!$email) {
        $error = 'Please enter your email.';
    } else {
        $found = null;
        foreach ($_SESSION['users'] ?? [] as $uname => $u) {
            if ($u['email'] === $email) {
                $found = $uname;
                break;
            }
        }
        if (!$found) {
            $error = 'No account found with that email.';
        } else {
            // In a real app we'd email the password. Here we just display it.
            $success = 'Your username is: <strong>' . htmlspecialchars($found) . '</strong>. (In a real app, a reset link would be emailed.)';
        }
    }
}
?>
    <div class="content">
        <?php if ($error): ?><p class="msg-error"><?= $error ?></p><?php endif; ?>
        <?php if ($success): ?><p class="msg-success"><?= $success ?></p><?php endif; ?>
        <form method="post">
            <fieldset style="width:340px;">
                <legend>FORGOT PASSWORD</legend>
                <div class="form-row">
                    <label>Enter Email:</label>
                    <input type="text" name="email">
                </div>
                <br>
                <button class="btn" type="submit">Submit</button>
            </fieldset>
        </form>
    </div>
<?php require 'footer.php'; ?>
