<?= layout('admin.layout.layout') ?>

<!-- Content Header (Page header) -->
<div class="content-header card card-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Usuários</h1>
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

<div class="form-group">
    <a href="<?= routeUrl('admin.user.create') ?>" type="button" class="btn btn-success">Novo Usuário</a>
</div>
<?php if(count($users)): ?>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col" width="150" class="text-center">Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <th scope="row"><?= $user->id ?></th>
            <td><?= $user->name ?></td>
            <td><?= $user->email ?></td>
            <td class="text-center">
                <a href="<?= routeUrl('admin.user.update', $user->id) ?>" class="btn btn-sm btn-warning">Editar</a>
                <a
                    href="#"
                    onclick="if(confirm('Deseja realmente deletar esse usuário?')){
                                document.getElementById('user_<?= $user->id ?>').submit();
                            }"
                    class="btn btn-sm btn-danger"
                >Excluir</a></td>
        </tr>
        <form action="<?= routeUrl('admin.user.delete', $user->id) ?>" method="post" id="user_<?= $user->id ?>">
            <?= method('DELETE') ?>
        </form>
    <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<div class="alert alert-warning text-center">
    Nenhum usuário encontrado!
</div>
<?php endif; ?>

</div>
</section>
