<?php
use \App\Session\Login;

//Obrigar usuário estar logado.
Login::requireLogin();
?>

<main>

  <style>
    .meuForm {
      margin-left: 50px;
      margin-right: 50px;
    }

    .customH2 {
      margin-left: 50px;
      margin-top: 20px;
    }

    .buttonVoltar {
      margin-left: 50px;
      background-color: #f7bc21;
      /* Green */
      border: none;
      color: white;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px;
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      padding: 5px 15px;
    }
  </style>

  <h2 class="customH2"><?= TITLE ?></h2>

  <form class="meuForm" method="post">

    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome" value="<?= $obCliente->nome ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf" value="<?= $obCliente->cpf ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label for="rg">RG</label>
        <input type="text" class="form-control" id="rg" placeholder="RG" name="rg" value="<?= $obCliente->rg ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label for="dataNascimento">Data de Nascimento</label>
        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="<?= $obCliente->dataNascimento ?>" required>
      </div>
      <div class="form-group col-md-3">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" id="telefone" placeholder="(xx)xxxxx-xxxx" name="telefone" value="<?= $obCliente->telefone ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label for="endereco">Endereço</label>
      <input type="text" class="form-control" id="endereco" placeholder="Rua Barão Geraldo, 750" name="endereco" value="<?= $obCliente->endereco ?>" required>
    </div>
    <div class="form-group">
      <label for="complemento">Complemento</label>
      <input type="text" class="form-control" id="complemento" placeholder="Apartamento, Casa, Kitnet" name="complemento" value="<?= $obCliente->complemento ?>" required>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="cidade">Cidade</label>
        <input type="text" class="form-control" id="cidade" placeholder="Digite a Cidade" name="cidade" value="<?= $obCliente->cidade ?>" required>
      </div>
      <div class="form-group col-md-4">
        <label for="estado">Estado</label>
        <select id="estado" class="form-control" name="estado" value="<?= $obCliente->estado ?>" required>
          <option selected>Escolher...</option>
          <option>AC</option>
          <option>AL</option>
          <option>AP</option>
          <option>AM</option>
          <option>BA</option>
          <option>CE</option>
          <option>ES</option>
          <option>GO</option>
          <option>MA</option>
          <option>MT</option>
          <option>MS</option>
          <option>MG</option>
          <option>PA</option>
          <option>PB</option>
          <option>PR</option>
          <option>PE</option>
          <option>PI</option>
          <option>RJ</option>
          <option>RN</option>
          <option>RS</option>
          <option>RO</option>
          <option>RR</option>
          <option>SC</option>
          <option>SP</option>
          <option>SE</option>
          <option>TO</option>
          <option>DF</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="cep">CEP</label>
        <input type="text" class="form-control" id="cep" name="cep" value="<?= $obCliente->cep ?>" required>
      </div>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
  </form>
  <section>
    <a href="index.php">
      <button class="buttonVoltar" value="Back">Voltar</button>
    </a>
  </section>
</main>