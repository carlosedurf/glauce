<?php layout('template.template') ?>

<div class="mt-4"></div>

<h1>Perfil</h1>

<hr>

<form method="post" action="<?= routeUrl('admin.user.update', $user->id) ?>">

    <?= method('PUT') ?>

    <div class="form-group">
        <label for="name" class="text-left">Nome</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Insira seu nome..." value="<?= $user->name ?>">
    </div>

    <div class="form-group">
        <label for="email" class="text-left">E-mail</label>
        <input type="email" name="email" disabled id="email" class="form-control" placeholder="Insira seu E-mail..." value="<?= $user->email ?>">
    </div>

    <hr>

    <div class="form-group">
        <label for="password" class="text-left">Senha</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Insira a senha...">
    </div>

    <div class="form-group">
        <label for="password_confirm" class="text-left">Confirme sua Senha</label>
        <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirme sua senha...">
    </div>

    <div class="form-group">
        <input type="submit" value="Atualizar" class="btn btn-success">
    </div>

</form>

