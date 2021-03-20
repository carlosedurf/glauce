<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com.br/favicon.ico">

    <title>Glauce - Framework</title>

    <!-- Font Awesome -->
<!--    <link rel="stylesheet" href="https://adminlte.io/themes/dev/AdminLTE/plugins/fontawesome-free/css/all.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://adminlte.io/themes/dev/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://adminlte.io/themes/dev/AdminLTE/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://adminlte.io/themes/dev/AdminLTE/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <style>
        body {
            padding-top: 5rem;
        }
        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="<?= routeUrl('/') ?>">Glauce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= routeUrl('/') ?>">Home <span class="sr-only">(atual)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= routeUrl('about') ?>">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= routeUrl('works') ?>">Trabalhos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= routeUrl('contact') ?>">Fale Conosco</a>
            </li>
        </ul>

        <?php if(auth()): ?>
        <ul class="my-2 my-lg-0">
            <li class="nav-item dropdown navbar-nav">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= authUser()->name ?></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="<?= routeUrl('perfil') ?>">Perfil</a>
                    <a class="dropdown-item" href="<?= routeUrl('logout') ?>">Sair</a>
                </div>
            </li>
        </ul>
        <?php else: ?>
            <ul class="my-2 my-lg-0 form-inline">
                <li class="navbar-nav">
                    <a class="btn btn-outline-success mr-2" href="<?= routeUrl('login') ?>">Entrar</a>
                </li>
                <li class="navbar-nav">
                    <a class="btn btn-outline-success" href="<?= routeUrl('register') ?>">Cadastrar</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>

<main role="main" class="container">

    <?php includeContent($view, $data); ?>

</main><!-- /.container -->

<!-- Principal JavaScript do Bootstrap
================================================== -->
<!-- Foi colocado no final para a página carregar mais rápido -->
<!-- jQuery -->
<script src="https://adminlte.io/themes/dev/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://adminlte.io/themes/dev/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://adminlte.io/themes/dev/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="https://adminlte.io/themes/dev/AdminLTE/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/dev/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://adminlte.io/themes/dev/AdminLTE/dist/js/demo.js"></script>

<script>
    function showMessage(){
        Alert("Passou");
    }
</script>

</body>
</html>