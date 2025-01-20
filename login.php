<?php session_start();

require_once 'modules/AuthCheck.php';

AuthCheck('clients.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM | Авторизация</title>
    <link rel="stylesheet" href="styles/modules/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/pages/login.css">
    <link rel="stylesheet" href="styles/pages/setting.css">
</head>
<body>
    <div class="container">
        <form class="login-form">
            <h2>Вход</h2>
            <label for="username">Логин:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Войти</button>
        </form>
    </div>
    
</body>
</html>