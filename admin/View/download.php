<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/admin/Assets/css/styles.css">
    <script type="text/javascript" src="/admin/Assets/js/jquery.js"></script>
</head>
<body>
<div class="back dash">
    <div class="container">
        <div class="top-line">
            <a href="/"><img src="/admin/Assets/img/logo.png" alt=""></a>
            <a class="logout" href="/admin/logout/">Log out</a>
        </div>
        <div class="content">


            <form  class="save_file_form" action="save/" method="POST">
                <div class="label-group">
                    <div class="tableHeader">
                        <?= $tableName ?>
                    </div>
                    <?= $check ?>
                </div>
                <select class="tableSelect">
                    <option disabled selected>select table for merge</option>
                    <?= $options ?>
                </select>
                <button class="save" type="submit">Download</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <img src="/admin/Assets/img/white-logo.png" alt="">
    </div>
    <script src="/admin/Assets/js/script.js"></script>
</div>
</body>
</html>