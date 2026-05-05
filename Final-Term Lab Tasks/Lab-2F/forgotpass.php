<?php
session_start();

$showPasswordField = false;
$message = "";

if (isset($_POST['checkEmail'])) {

    $email = $_POST['email'];

    if ($email == "") {
        $message = "Enter email!";
    } else if (isset($_SESSION['user']) && $email == $_SESSION['user']['email']) {
        $showPasswordField = true;
    } else {
        $message = "Email not found!";
    }
}

if (isset($_POST['updatePass'])) {

    $newPass = $_POST['newPassword'];

    if ($newPass == "") {
        $message = "Enter new password!";
        $showPasswordField = true;
    } else {
        $_SESSION['user']['password'] = $newPass;
        $message = "Password updated successfully!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
</head>

<body>

    <table border="1" width="40%" cellspacing="0" cellpadding="10" align="center">
        <tr>
            <td>
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <h2 style="color:green;">XCompany</h2>
                    <div>
                        <a href="home.html">Home</a> |
                        <a href="login.html">Login</a> |
                        <a href="Registration.html">Registration</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td align="center">

                <form method="post">

                    <fieldset style="width:300px; margin: 0 auto;">
                        <legend><b>FORGOT PASSWORD</b></legend>

                        <?php if (!$showPasswordField) { ?>

                            Enter Email: <input type="email" name="email"><br><br>
                            <input type="submit" name="checkEmail" value="Submit">

                        <?php } else { ?>

                            Enter New Password: <input type="password" name="newPassword"><br><br>
                            <input type="submit" name="updatePass" value="Update Password">

                        <?php } ?>

                    </fieldset>

                </form>

                <p><?php echo $message; ?></p>

            </td>
        </tr>

        <tr>
            <td align="center">Copyright &copy; 2017</td>
        </tr>

    </table>

</body>

</html>