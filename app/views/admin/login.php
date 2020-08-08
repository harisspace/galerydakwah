<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/theme.css">
    <title>Login</title>
    <link rel="shortcut icon" href="<?= BASEURL; ?>/img/favicon.ico" />
</head>

<body>
    <div class="login-div1">
        <div class="login-div2">
            <div class="login-logo">Login</div>
            <form action="<?= BASEURL; ?>/admin/login" method="POST" class="login-form">
                <input type="username" name="username" placeholder="username" class="username">
                <input type="password" name="password" placeholder="password" class="password">
                <button type="submit" name="login" class="btn-login">Login</button>
            </form>
        </div>
    </div>
</body>

</html>