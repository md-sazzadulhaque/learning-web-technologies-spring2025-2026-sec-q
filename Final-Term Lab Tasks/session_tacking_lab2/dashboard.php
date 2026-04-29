<?php
require 'auth_guard.php';
require 'header.php';
?>
    <div class="content">
        <div class="layout">
            <?php require 'sidebar.php'; ?>
            <div class="main">
                <h3>Welcome <?= htmlspecialchars($_SESSION['username']) ?></h3>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>
