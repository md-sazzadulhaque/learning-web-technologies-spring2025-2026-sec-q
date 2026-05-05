<?php
session_start();

if (!isset($_SESSION['status'])) {
    header('location: login.html');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
</head>

<body>

    <table border="1" width="50%" cellspacing="0" cellpadding="10" align="center">

        <tr>
            <td colspan=2>
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <h2 style="color:green; margin:0;">XCompany</h2>

                    <div>
                        Logged in as
                        <a href="profile.php"><?php echo $_SESSION['user']['username']; ?></a> |
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td width="25%" valign="top">
                <h3>Account</h3>
                <hr>

                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="profile.php">View Profile</a></li>
                    <li><a href="edit.php">Edit Profile</a></li>
                    <li><a href="profilePic.php">Change Profile Picture</a></li>
                    <li><a href="change_password.php">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </td>

            <td valign="top">

                <fieldset>
                    <legend><b>PROFILE</b></legend>

                    <table width="50%">

                        <tr>
                            <td width="60%">
                                Name : <?php echo $_SESSION['user']['name']; ?>
                                <hr>
                                Email : <?php echo $_SESSION['user']['email']; ?>
                                <hr>
                                Gender : <?php echo $_SESSION['user']['gender']; ?>
                                <hr>
                                Date of Birth : <?php echo $_SESSION['user']['dob']; ?>
                            </td>

                            <td align="center">
                                <?php
                                $image = 'default.png';

                                if (isset($_SESSION['user']['image']) && $_SESSION['user']['image'] != "") {

                                    $path = "Upload/" . $_SESSION['user']['image'];

                                    if (file_exists($path)) {
                                        $image = $_SESSION['user']['image'];
                                    }
                                }
                                ?>
                                <img src="Upload/<?php echo $image; ?>" alt="Profile Picture" width="220"
                                    style="padding-left: 40px;"><br>
                                <a href="profilePic.php" style="padding-left: 40px;">Change</a>
                            </td>
                        </tr>

                    </table>

                    <hr>
                    <a href="edit.php">Edit Profile</a>

                </fieldset>

            </td>
        </tr>
        
        <tr>
            <td colspan=2 align="center">
                Copyright &copy; 2017
            </td>
        </tr>

    </table>

</body>

</html>