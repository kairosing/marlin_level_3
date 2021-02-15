<?php
include "../functions/functions.php";
$db = include "../database/start.php";
include "../components/Flash.php";

$id = $_GET['id'];
$user = $db->getOne('users', $id);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Профиль пользователя <?php echo $user['username'];?></h1>

                <?php if (Flash::flashExists('danger')):?>
                <div class="alert alert-danger">
                    <?php Flash::flashString('danger');?>
                </div>
                <?php endif;?>

                <?php if (Flash::flashExists('danger')):?>
                <div class="alert alert-success">
                    <?php Flash::flashString('danger');?>
                </div>
                <?php endif;?>


                <form action="../update.php?id=<?php echo $user['id'];?>" method="post" class="form-control">
                    <label for="username" class="col-form-label">User name</label>
                    <input type="text" name="username"  class="form-control" value="<?php echo $user['username'];?>">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $user['email'];?>">
                    <input type="hidden" name="id" value="<?php echo $user['id'];?>">
                    <hr>
                    <button type="submit" class="btn btn-warning">Edit</button>
                </form>
                
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>

</html>