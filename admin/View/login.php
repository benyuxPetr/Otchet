<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/admin/Assets/css/styles.css">
</head>
<body>
<div class="auth_container back">
    <div class="form-window">
        <a href="/"><img src="../Assets/img/logo.png" alt=""></a>
        <form  class="login_form" action="/admin/auth/" method="POST">
            <input name="email" placeholder="E-mail" type="email" required autofocus>
            <input name="password" placeholder="Password" type="password" required>
            <button type="submit">Sign in</button>
        </form>
    </div>
</div>
</body>
</html>