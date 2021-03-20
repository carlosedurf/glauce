<?php layout('template.template') ?>

<div class="mt-4"></div>

<h1>Fale Conosco</h1>

<hr>

<form method="post">

    <div class="form-group">
        <label for="name" class="text-left">Nome</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Insira seu nome...">
    </div>

    <div class="form-group">
        <label for="email" class="text-left">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Insira seu E-mail...">
    </div>

    <div class="form-group">
        <label for="title" class="text-left">Assunto</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Insira o Assunto...">
    </div>

    <div class="form-group">
        <label for="msg" class="text-left">Assunto</label>
        <textarea name="msg" id="msg" rows="5" class="form-control" placeholder="Insira a mensagem..."></textarea>
    </div>

    <div class="form-group">
        <input type="submit" value="Enviar" class="btn btn-success">
    </div>

</form>

