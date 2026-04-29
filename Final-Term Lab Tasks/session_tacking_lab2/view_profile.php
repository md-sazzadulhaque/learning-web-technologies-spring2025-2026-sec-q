<?php
require 'auth_guard.php';
require 'header.php';
$u = $currentUser;
?>
    <div class="content">
        <div class="layout">
            <?php require 'sidebar.php'; ?>
            <div class="main">
                <fieldset class="profile-box" style="width:100%;position:relative;">
                    <legend>PROFILE</legend>
                    <?php if ($u['picture']): ?>
                        <img class="profile-pic" src="<?= htmlspecialchars($u['picture']) ?>" alt="Profile">
                    <?php else: ?>
                        <span class="profile-pic-default">&#128100;</span>
                    <?php endif; ?>
                    <div class="profile-row"><span class="label">Name</span><span>:<?= htmlspecialchars($u['name']) ?></span></div>
                    <div class="profile-row"><span class="label">Email</span><span>:<?= htmlspecialchars($u['email']) ?></span></div>
                    <div class="profile-row"><span class="label">Gender</span><span>:<?= htmlspecialchars($u['gender']) ?></span></div>
                    <div class="profile-row">
                        <span class="label">Date of Birth</span>
                        <span>:<?= htmlspecialchars($u['dob']) ?></span>
                        &nbsp;&nbsp;<a href="change_picture.php">Change</a>
                    </div>
                    <br>
                    <a href="edit_profile.php">Edit Profile</a>
                </fieldset>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>
