<?php
require 'header.php';

if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    if (!$username || !$password) {
        $error = 'Please enter username and password.';
    } elseif (!isset($_SESSION['users'][$username])) {
        $error = 'Invalid username or password.';
    } elseif (!password_verify($password, $_SESSION['users'][$username]['password'])) {
        $error = 'Invalid username or password.';
    } else {
        $_SESSION['username'] = $username;
        if ($remember) {
            setcookie('remember_user', $username, time() + (86400 * 30), '/');
        }
        header('Location: dashboard.php');
        exit;
    }
}
?>
    <div class="content">
        <?php if ($error): ?><p class="msg-error"><?= $error ?></p><?php endif; ?>
        <form method="post">
            <fieldset style="width:340px;">
                <legend>LOGIN</legend>
                <div class="form-row">
                    <label>User Name :</label>
                    <input type="text" name="username">
                </div>
                <div class="form-row">
                    <label>Password &nbsp;:</label>
                    <input type="password" name="password">
                </div>
                <br>
                <label><input type="checkbox" name="remember"> Remember Me</label>
                <br><br>
                <button class="btn" type="submit">Submit</button>
                <a href="forgot_password.php">Forgot Password?</a>
            </fieldset>
        </form>
    </div>
<?php require 'footer.php'; ?>
