<?php 
    session_start();
?>

<html>

<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-3 align-center">
        <div>
            <h1 class="text-center">
                Register
            </h1>
        </div>
        <form action="../Controller/RegisterController.php" method="post">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="user_email" class="form-control" id="staticEmail" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="user_name" class="form-control" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="user_password" class="form-control" id="input_password" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" name="user_confirm_password" class="form-control" id="input_password" required>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-6"> 
                    <a href="login.php" class="col-sm-6 col-form-label">Sign in?</a>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-success" name="btnRegister">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <?php
    //if session message is set then this block of code will be excecuted
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
        echo "<div class='alert alert-danger text-center'>$message</div>";
    }
    ?>

</body>

</html>