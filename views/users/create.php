<?php layout('template.template'); ?>

<h2>Usuário - Criação</h2>
<hr>

<?php if(!empty($error)): ?>
<div class="alert alert-danger">
    <?= $error; ?>
</div>
<?php endif; ?>

<form method="post">

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