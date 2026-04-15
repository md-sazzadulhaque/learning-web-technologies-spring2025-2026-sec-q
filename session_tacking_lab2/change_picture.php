<?php
require 'auth_guard.php';

$error   = '';
$success = '';
$uname   = $_SESSION['username'];
$u       = $currentUser;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] === 0) {
        $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $mime    = mime_content_type($_FILES['picture']['tmp_name']);
        if (!in_array($mime, $allowed)) {
            $error = 'Only JPG, PNG, GIF, WEBP images are allowed.';
        } else {
            // Store as base64 data URI in session
            $data = base64_encode(file_get_contents($_FILES['picture']['tmp_name']));
            $src  = 'data:' . $mime . ';base64,' . $data;
            $_SESSION['users'][$uname]['picture'] = $src;
            $u       = $_SESSION['users'][$uname];
            $success = 'Profile picture updated.';
        }
    } else {
        $error = 'Please choose a file to upload.';
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
                <form method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>PROFILE PICTURE</legend>
                        <div style="margin-bottom:12px;">
                            <?php if ($u['picture']): ?>
                                <img src="<?= $u['picture'] ?>" style="width:80px;height:80px;object-fit:cover;border-radius:50%;" alt="Profile"><br>
                            <?php else: ?>
                                <span style="font-size:70px;color:#555;">&#128100;</span><br>
                            <?php endif; ?>
                        </div>
                        <input type="file" name="picture" accept="image/*">
                        <hr style="margin:10px 0;">
                        <button class="btn" type="submit">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>
