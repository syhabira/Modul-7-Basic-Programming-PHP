<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
$usn = $_POST ['usn'];
$pass = $_POST ['pass'];
$correctUsn="admin";
$correctPass = "admin123";
if($usn === $correctUsn && $pass ===$correctPass){
header("Location:ticket.php");
exit ();
}
else{
    
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 flex flex-row items-center justify-evenly min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center mb-8">Login</h2>
        <form action="" method="post">
            <div class="text-gray-500 font-semibold mb-2">Username</div>
            <input type="text" name="usn" class="w-full p-2 mb-5 border border-gray-400 rounded-md"> 

            <div class="text-gray-500 font-semibold mb-2">Password</div>
            <input type="password" name="pass" class="w-full p-2 mb-5 border border-gray-400 rounded-md"> 

            <input type="submit" name="continue" value="Login" class="w-full bg-emerald-400 p-2 text-white rounded-md font-semibold hover:bg-emerald-300 mb-5 mt-3">
        </form>
    </div>
</body>
</html>