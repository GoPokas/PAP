<?php
// include('./user/loggedin_verify.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>LeaviFy</title>
    <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
</head>

<body>
    <!-- component -->
    <div class="flex items-center justify-center h-screen">
        <div class="bg-gray-100 flex flex-col w-80 border border-gray-100 rounded-lg px-8 py-10 shadow">
            <div class="text-white">
            </div>
            <form class="flex flex-col space-y-8" action="login.php" method="POST">
                <img src="imgs/logo.png" alt="Company Logo" class="w-20 h-20 mx-auto">
                <input type="text" name="idfunc" autofocus placeholder="Nº Funcionário" required class="border rounded-lg py-3 px-3 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-300 focus:bg-gray-300 focus:outline-none">
                <input type="password" name="password" placeholder="Password" required class="border rounded-lg py-3 px-3 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-300 focus:bg-gray-300 focus:outline-none">
                <button type="submit" class="border border-blue-500 bg-blue-500 text-white rounded-lg py-3 font-semibold uppercase hover:border-blue-700 hover:bg-blue-700 active:border-blue-900 active:bg-blue-900">login</button>
            </form>
        </div>
    </div>
</body>

</html>