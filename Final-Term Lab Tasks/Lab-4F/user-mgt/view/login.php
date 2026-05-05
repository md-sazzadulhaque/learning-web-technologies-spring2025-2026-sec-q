<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
        <form method="post" action="../controller/loginCheck.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Signin</legend>
                Username:   <input type="text" name="username" value=""> <br>
                Password:   <input type="password" name="password" value=""> <br>
                            <input type="submit" name="submit" value="Submit">
            </fieldset>
        </form>
</body>
</html>