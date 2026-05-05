<?php

    session_start();
    
    $users = [
            ['id'=>1, 'name'=>'alamin', 'email'=>'alamin@aiub.edu'],
            ['id'=>2, 'name'=>'xyz', 'email'=>'alamin@aiub.edu'],
            ['id'=>3, 'name'=>'abc', 'email'=>'alamin@aiub.edu'],
            ['id'=>4, 'name'=>'pqr', 'email'=>'alamin@aiub.edu'],
            ['id'=>5, 'name'=>'zzz', 'email'=>'alamin@aiub.edu']
    ];
    $_SESSION['users']= $users;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>User list </h1>
    <a href='home.php'>Back</a> |
    <a href='addUser.php'>Add User</a>
    <a href='../controller/logout.php'>Logout</a>
    <br>

    <table border=1>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php foreach($users as $user){ ?>

        <tr>
            <td><?php echo $user['id'];?></td>
            <td><?php echo $user['name'];?></td>
            <td><?=$user['email']?></td>
            <td>
                <a href="edit.php?id=<?=$user['id']?>">EDIT </a> |
                <a href="delete.php">DELETE </a> |
                <a href="detail.php">DETAILS </a>
            </td>
        </tr>
        
        <?php } ?>
</table>
</body>
</html>