<?php layout('template.template'); ?>

<div class="form-group">
    <a href="<?= HOME.'/user/create' ?>" type="button" class="btn btn-success">Novo Usuário</a>
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
                <a href="<?= HOME . '/user/update/' . $user->id ?>" class="btn btn-sm btn-warning">Editar</a>
                <a
                    href="#"
                    onclick="if(confirm('Deseja realmente deletar esse usuário?')){
                                document.getElementById('user_<?= $user->id ?>').submit();
                            }"
                    class="btn btn-sm btn-danger"
                >Excluir</a></td>
        </tr>
        <form action="<?= HOME . '/user/delete/' . $user->id ?>" method="post" id="user_<?= $user->id ?>">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<div class="alert alert-warning text-center">
    Nenhum usuário encontrado!
</div>
<?php endif; ?>