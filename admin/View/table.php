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
<div class="back dash">
    <div class="container">
        <div class="top-line">
            <a href="#" onclick="history.back()"><img src="/admin/Assets/img/logo.png" alt=""></a>
            <a class="logout" href="/admin/logout/">Log out</a>
        </div>
        <div class="content">
            <div class="table">
                <?= $table ?>
            </div>
            <a class="download" href="download/">download</a>
        </div>
    </div>
    <div class="footer">
        <img src="/admin/Assets/img/white-logo.png" alt="">
    </div>
</div>
</body>
</html>