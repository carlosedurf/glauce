
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Cadastro :: Glauce</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin card card-body" action="<?= routeUrl('register') ?>" method="post">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72" style="margin: auto;">
    <h1 class="h3 mb-3 font-weight-normal">Registrar-se no Sistema</h1>
    <label for="inputName" class="sr-only">Nome</label>
    <input type="text" id="inputName" class="form-control" name="name" placeholder="Nome" required autofocus>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Senha" required>
    <label for="inputPasswordConfirm" class="sr-only">Confirme sua Senha</label>
    <input type="password" id="inputPasswordConfirm" name="password_confirm" class="form-control" placeholder="Confirme sua Senha" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
</form>
</body>
</html>