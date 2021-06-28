<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <table border="8">
        <tr>
            <th>Id</th>
            <th>Img</th>
            <th>Name</th>
            <th>Email</th>
            <?php if($userrole == 1) :?>
            <th>Update</th>
            <th>Delete</th>
            <?php endif; ?>


        </tr>
        <?php foreach($data as $user): ?>
        <tr>
            <td><?= $user['id']; ?></td>
            <td><img width="50px" height="50px" src="userimage/<?= $user['img']; ?>"></td>
            <td><?= $user['name']; ?></td>
            <td><?= $user['email']; ?></td>
            <?php if($userrole == 1) :?>
            <td><a href="updateuser.php?id=<?= $user['id']; ?>">Update</a></td>
            <td><a href="deleteuser.php?id=<?= $user['id']; ?>">Delete</a></td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>