<?php
require 'auth_guard.php';

$error   = '';
$success = '';
$u       = $currentUser;
$uname   = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name   = trim($_POST['name'] ?? '');
    $email  = trim($_POST['email'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $dob    = trim($_POST['dob'] ?? '');

    if (!$name || !$email || !$gender || !$dob) {
        $error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email address.';
    } else {
        $_SESSION['users'][$uname]['name']   = $name;
        $_SESSION['users'][$uname]['email']  = $email;
        $_SESSION['users'][$uname]['gender'] = $gender;
        $_SESSION['users'][$uname]['dob']    = $dob;
        $u = $_SESSION['users'][$uname];
        $success = 'Profile updated successfully.';
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
                        <legend>EDIT PROFILE</legend>
                        <div class="form-row">
                            <label>Name</label>
                            <span>:</span>&nbsp;<input type="text" name="name" value="<?= htmlspecialchars($u['name']) ?>">
                        </div>
                        <div class="form-row">
                            <label>Email</label>
                            <span>:</span>&nbsp;<input type="email" name="email" value="<?= htmlspecialchars($u['email']) ?>"> &nbsp;<strong>i</strong>
                        </div>
                        <div class="form-row">
                            <label>Gender</label>
                            <span>:</span>&nbsp;
                            <label><input type="radio" name="gender" value="Male" <?= $u['gender']==='Male'?'checked':'' ?>> Male</label>&nbsp;
                            <label><input type="radio" name="gender" value="Female" <?= $u['gender']==='Female'?'checked':'' ?>> Female</label>&nbsp;
                            <label><input type="radio" name="gender" value="Other" <?= $u['gender']==='Other'?'checked':'' ?>> Other</label>
                        </div>
                        <div class="form-row">
                            <label>Date of Birth</label>
                            <span>:</span>&nbsp;
                            <div>
                                <input type="text" name="dob" value="<?= htmlspecialchars($u['dob']) ?>" placeholder="dd/mm/yyyy">
                                <br><span style="color:#c00;font-style:italic;">(dd/mm/yyyy)</span>
                            </div>
                        </div>
                        <br>
                        <button class="btn" type="submit">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>
