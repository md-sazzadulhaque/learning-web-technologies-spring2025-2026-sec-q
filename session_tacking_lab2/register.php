<?php
require 'header.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';
    $gender   = $_POST['gender'] ?? '';
    $dob_d    = trim($_POST['dob_d'] ?? '');
    $dob_m    = trim($_POST['dob_m'] ?? '');
    $dob_y    = trim($_POST['dob_y'] ?? '');

    if (!$name || !$email || !$username || !$password || !$gender || !$dob_d || !$dob_m || !$dob_y) {
        $error = 'All fields are required.';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email address.';
    } elseif (isset($_SESSION['users'][$username])) {
        $error = 'Username already taken.';
    } else {
        $dob = sprintf('%02d/%02d/%04d', $dob_d, $dob_m, $dob_y);
        $_SESSION['users'][$username] = [
            'name'     => $name,
            'email'    => $email,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'gender'   => $gender,
            'dob'      => $dob,
            'picture'  => null,
        ];
        $success = 'Registration successful! <a href="login.php">Login here</a>.';
    }
}
?>
    <div class="content">
        <?php if ($error): ?><p class="msg-error"><?= $error ?></p><?php endif; ?>
        <?php if ($success): ?><p class="msg-success"><?= $success ?></p><?php endif; ?>
        <form method="post">
            <fieldset>
                <legend>REGISTRATION</legend>
                <div class="form-row">
                    <label>Name</label>
                    <span>:</span>&nbsp;<input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                </div>
                <div class="form-row">
                    <label>Email</label>
                    <span>:</span>&nbsp;<input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"> &nbsp;<strong>i</strong>
                </div>
                <div class="form-row">
                    <label>User Name</label>
                    <span>:</span>&nbsp;<input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                </div>
                <div class="form-row">
                    <label>Password</label>
                    <span>:</span>&nbsp;<input type="password" name="password">
                </div>
                <div class="form-row">
                    <label>Confirm Password</label>
                    <span>:</span>&nbsp;<input type="password" name="confirm_password">
                </div>
                <fieldset class="gender-group">
                    <legend>Gender</legend>
                    <label><input type="radio" name="gender" value="Male" <?= (($_POST['gender'] ?? '') === 'Male') ? 'checked' : '' ?>> Male</label>
                    <label><input type="radio" name="gender" value="Female" <?= (($_POST['gender'] ?? '') === 'Female') ? 'checked' : '' ?>> Female</label>
                    <label><input type="radio" name="gender" value="Other" <?= (($_POST['gender'] ?? '') === 'Other') ? 'checked' : '' ?>> Other</label>
                </fieldset>
                <fieldset class="gender-group">
                    <legend>Date of Birth</legend>
                    <div class="dob">
                        <input type="text" name="dob_d" maxlength="2" placeholder="DD" value="<?= htmlspecialchars($_POST['dob_d'] ?? '') ?>"> /
                        <input type="text" name="dob_m" maxlength="2" placeholder="MM" value="<?= htmlspecialchars($_POST['dob_m'] ?? '') ?>"> /
                        <input type="text" name="dob_y" maxlength="4" placeholder="YYYY" value="<?= htmlspecialchars($_POST['dob_y'] ?? '') ?>">
                        <span class="hint">(dd/mm/yyyy)</span>
                    </div>
                </fieldset>
                <br>
                <button class="btn" type="submit">Submit</button>
                <button class="btn" type="reset">Reset</button>
            </fieldset>
        </form>
    </div>
<?php require 'footer.php'; ?>
