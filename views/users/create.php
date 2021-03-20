<?= layout('admin.layout.layout') ?>

<!-- Content Header (Page header) -->
<div class="content-header card card-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Usuários - Criação</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= routeUrl('admin') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Usuário</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
<div class="container-fluid card card-body">

<form method="post" action="<?= routeUrl('admin.user.insert') ?>">

    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Entre com Nome do Usuário" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Entre com email" required>
    </div>
    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Insira senha" required>
    </div>
    <div class="form-group">
        <label for="password_confirm">Senha</label>
        <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Insira senha novamente" required>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

</div>
</section>