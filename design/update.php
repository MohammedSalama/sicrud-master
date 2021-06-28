<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <form action="updateuser.php" method="post" enctype="multipart/form-data">
        <input type="name" value="<?= $userData['name']; ?>" name="name" placeholder="Your Name">
        <input type="email" value="<?= $userData['email']; ?>" name="email" placeholder="Your Email">
        <input type="password" name="password" placeholder="Your Password">
        <img width="50px" height="50px" src="userimage/<?= $userData['img']; ?>">
        <input type="hidden" name="id" value="<?= $userData['id']; ?>">
        <input type="file" name="img">
        <input type="submit" name="submit" value="Enroll">
    </form>

</body>

</html>