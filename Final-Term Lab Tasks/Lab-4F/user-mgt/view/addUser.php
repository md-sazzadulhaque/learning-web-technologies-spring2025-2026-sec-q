<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add User</title>
</head>
<body>

    <h2>Add New User</h2>
    <form method="post" action="../controller/regCheck.php">

        <fieldset style="width: 50%; margin: 0 auto;">
            <legend>Add User</legend>

            <table border="1" cellpadding="10" cellspacing="0" align="center">

                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" value="" required></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="" required></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="" required></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" value="" required></td>
                </tr>

                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value="" required></td>
                </tr>

                <tr>
                    <td>Role</td>
                    <td>
                        <input type="radio" name="role" value="admin"     required> Admin
                        <input type="radio" name="role" value="moderator"         > Moderator
                        <input type="radio" name="role" value="user" checked      > User
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="banned">Banned</option>
                        </select>
                    </td>
                </tr>

                <tr align="center">
                    <td colspan="2">
                        <button type="submit" name="submit" value="Submit">Submit</button>
                        <button type="reset"  name="reset"  value="Reset" >Reset</button>
                    </td>
                </tr>

            </table>

        </fieldset>
    </form>

</body>
</html>