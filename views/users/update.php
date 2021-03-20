<?= layout('admin.layout.layout') ?>

<!-- Content Header (Page header) -->
<div class="content-header card card-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Usuários - Atualização</h1>
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

<?php if(!empty($error)): ?>
<div class="alert alert-danger">
    <?= $error; ?>
</div>
<?php endif; ?>

<form method="post">
    <?= method('PUT') ?>

    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Entre com Nome do Usuário" value="<?= $user->name ?>" required>
    </div>

    <hr>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Insira senha">
    </div>
    <div class="form-group">
        <label for="password_confirm">Senha</label>
        <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Insira senha novamente">
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

    </div>
</section>