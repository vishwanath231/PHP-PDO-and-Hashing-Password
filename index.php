<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="Bootstrap/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container-sm" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="display-5 text-center mb-4">login</div>
            <?php if (isset($_SESSION['loginMsg'])) { ?>
                <div class="text-center mt-2 mb-2"> <?php echo $_SESSION['loginMsg']; ?> </div>
            <?php } ?>
            <form action="server/controller/controller.php" method="POST" class="col-md-6 col-md-offset-3"">
                <div class=" mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="example@support.com">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="******">
                </div>
                <button type="submit" name="login" class="btn btn-primary">login</button>
            </form>
            <div class="text-center">You don't have account! <a href="register.php">SignUp Here</a></div>
        </div>
    </div>

</body>

</html>