<?php
session_start();

if (!isset($_SESSION['status'])) {
    header('location: login.html');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile</title>
</head>

<body>

    <table border="1" width="50%" cellspacing="0" cellpadding="10" align="center">

        <tr>
            <td colspan=2>
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <h2 style="color:green; margin:0;">XCompany</h2>

                    <div>
                        Logged in as
                        <a href="profile.php">
                            <?php echo $_SESSION['user']['username']; ?>
                        </a> |
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

                <form method="post" action="editCheck.php">
                    <fieldset>
                        <legend><b>EDIT PROFILE</b></legend>

                        <?php
                        $dobParts = explode("/", $_SESSION['user']['dob']);
                        ?>

                        <table>

                            <tr>
                                <td>Name</td>
                                <td>: <input type="text" name="name" value="<?php echo $_SESSION['user']['name']; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>: <input type="email" name="email"
                                        value="<?php echo $_SESSION['user']['email']; ?>"></td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>

                            <tr>
                                <td>Gender</td>
                                <td>:
                                    <input type="radio" name="gender" value="male" <?php
                                    if ($_SESSION['user']['gender'] == 'male')
                                        echo "checked"; ?>> Male

                                    <input type="radio" name="gender" value="female" <?php
                                    if ($_SESSION['user']['gender'] == 'female')
                                        echo "checked"; ?>> Female

                                    <input type="radio" name="gender" value="other" <?php
                                    if ($_SESSION['user']['gender'] == 'other')
                                        echo "checked"; ?>> Other
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>

                            <tr>
                                <td>Date of Birth</td>
                                <td>:
                                    <input type="text" name="dd" size="2" value="<?php echo $dobParts[0]; ?>"> /
                                    <input type="text" name="mm" size="2" value="<?php echo $dobParts[1]; ?>"> /
                                    <input type="text" name="yyyy" size="4" value="<?php echo $dobParts[2]; ?>">
                                    <br>(dd/mm/yyyy)
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" value="Submit"></td>
                            </tr>

                        </table>

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