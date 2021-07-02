<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container" style="background-image: url('public/images/anni.jpg'); height:600px; width:100%;">
<?php if (isset($_SESSION['login_message'])) {
    unset($_SESSION['login_message']) ?>
    <p>Login fail, please try again!</p>
<?php } ?>
    <div class="row justify-content-center mt-3">
        <div class="col-5">
            <div class="login-form">
                <h1 class="text-center" style="font-weight: bold; color:#fff;">Login</h1>
                    <form action=".?action=handlelogin" method="POST" class="border rounded p-4">
                        <div class="form-group">
                            <lable for="email" style="font-weight: bold; color:#fff;">Email</lable>
                            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" value="<?php if (!empty($_COOKIE['email'])) {echo $_COOKIE['email']; } ?>">
                        </div>
                        <div class="form-group">
                            <lable for="password" style="font-weight: bold; color:#fff;">Password</lable>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php if (!empty($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">
                        </div>
                        <div class="form-group text-center">
                        <input type="submit" value="Login" class="btn btn-primary mt-2 "></input>
                        </div>
                        
                    </form>
            </div>
        </div>
    </div>        
</div>
</body>
</html>   