<?php
session_start();

if (!isset($_SESSION['status'])) {
    header('location: login.html');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>

    <table border="1" width="50%" cellspacing="0" cellpadding="10" align=center>
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

                <form method="post" action="uploadCheck.php" enctype="multipart/form-data">
                    <fieldset style="width:300px; margin: 0 auto;">
                        <legend><b>PROFILE PICTURE</b></legend>
                        <input type="file" name="profilePic" accept=".jpg, .jpeg, .png"><br>
                        <br><input type="submit" name="submit" value="Upload">
                    </fieldset>
                </form>


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