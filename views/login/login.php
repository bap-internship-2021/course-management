<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container mx-auto mt-5">
        <section>
            <h1 class="text-blue-300 text-5xl text-center">Login</h1>
            <form class="w-3/5 mx-auto mt-3 border-2 border-blue-300 rounded-md flex flex-col"
                  action=".?action=handlelogin"
                  method="POST">
                <lable for="email" class="w-3/5 mx-auto mt-3">Email</lable>
                <input type="text" name="email"
                       class="bg-gray-200 focus:bg-white border border-black rounded-md w-3/5 mx-auto p-2"
                       value="<?php if (!empty($_COOKIE['email'])) {
                           echo $_COOKIE['email'];
                       } ?>">

                <lable for="password" class="w-3/5 mx-auto mt-3">Password</lable>
                <input type="password" name="password"
                       class="bg-gray-200 focus:bg-white border border-black rounded-md w-3/5 mx-auto p-2"
                       value="<?php if (!empty($_COOKIE['password'])) {
                           echo $_COOKIE['password'];
                       } ?>">

                <!-- Button submit -->
                <input type="submit" value="Login"
                       class="bg-blue-300 border border-black rounded-md w-1/5 mx-auto p-2 my-3 hover:bg-blue-400">
            </form>

            <?php if (isset($_SESSION['login_message'])) {
                unset($_SESSION['login_message']) ?>
                <p class="text-red-500 text-center">Login fail, please try again!</p>
            <?php } ?>
        </section>
    </div>
</body>
</html>