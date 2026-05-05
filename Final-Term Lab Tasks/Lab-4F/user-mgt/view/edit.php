<?php
    session_start();
    $users = $_SESSION['users'];
    $id = $_GET['id'];
    $user = [];
    foreach($users as $u){
        if($id == $u['id']){
            $user = $u;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit</title>
</head>
<body>
        <h1>Edit User!</h1>
        <a href='user_list.php'>Back</a> |
        <a href='../controller/logout.php'>Logout</a>
        <br>

        <form method="post" action="../controller/update.php" enctype="">
            ID: <input type="text" name="username" readonly value="<?=$user['id']?>"/> <br>
            USERNAME: <input type="text" name="username" value="<?=$user['name']?>"/> <br>
            EMAIL: <input type="text" name="username" value="<?=$user['email']?>"/> <br>
            <input type="submit" name="submit" value="Submit"/>
        </form>
</body>
</html>