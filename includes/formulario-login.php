<?php

$alertaLogin = strlen($alertaLogin) ? '<div class=" alert alert-danger">'.$alertaLogin.'</div>' : '';
$alertaCadastro = strlen($alertaCadastro) ? '<div class=" alert alert-danger">'.$alertaCadastro.'</div>' : '';

?>

<style>
#form{
    margin-top: 100px;
    margin-left: 300px;
    margin-right: 300px;
}

</style>

<div class="jumbotron text-dark" id="form">

    <div class="row">

        <div class="col">

            <form method="post">

                <h2>Login</h2>
                <?=$alertaLogin?>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                <button type="submit" name="acao" value="logar" class="btn btn-primary">Entrar</button>
            </div>

            </form>
        </div>

        <div class="col">

        <form method="post">

                <h2>Cadastrar-se</h2>
                <?=$alertaCadastro?>

                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar</button>
            </div>

            </form>

        </div>
    </div>
</div>