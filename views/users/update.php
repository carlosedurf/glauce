<?php layout('template.template'); ?>

<h2>Usuário - Atualização</h2>
<hr>

<?php if(!empty($error)): ?>
<div class="alert alert-danger">
    <?= $error; ?>
</div>
<?php endif; ?>

<form method="post">

    <input type="hidden" name="_method" value="PUT">

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