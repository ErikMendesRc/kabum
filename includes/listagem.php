<?php

use \App\Session\Login;

//Obrigar usuário estar logado.
Login::requireLogin();

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;

        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
            break;
    }
}

$resultados = '';
foreach ($clientes as $cliente) {
    $resultados .= '<tr>
                    <td>' . $cliente->idcliente . '</td>
                    <td>' . $cliente->nome . '</td>
                    <td>' . date('d/m/Y', strtotime($cliente->dataNascimento)) . '</td>
                    <td>' . $cliente->cpf . '</td>
                    <td>' . $cliente->rg . '</td>
                    <td>' . $cliente->telefone . '</td>
                    <td>' . $cliente->endereco . '</td>
                    <td>' . $cliente->complemento . '</td>
                    <td>' . $cliente->cep . '</td>
                    <td>' . $cliente->estado . '</td>
                    <td>' . $cliente->cidade . '</td>
                    <td>
                        <a href="editar.php?idcliente=' . $cliente->idcliente . '">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?idcliente=' . $cliente->idcliente . '">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                  </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
<td colspan=12" class="text-center">
       Nenhum Cliente Encontrado
</td>
</tr>';

?>

<main>

    <?= $mensagem ?>
    <style>
        .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            margin-left: 900px;
            margin-top: 50px;
            border-radius: 5px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            padding: 15px 32px;
        }
    </style>


    <section>
        <a href="cadastrar.php">
            <button class="button">Novo Cliente</button>
        </a>
    </section>

    <section>
        <style>
            #clientes {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 80%;
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
            }

            #clientes td,
            #clientes th {
                border: 1px solid #ddd;
                padding: 8px;
                width: auto;
            }

            #clientes th {
                padding-top: 5px;
                padding-bottom: 5px;
                text-align: left;
                background-color: #e39c39;
            }
        </style>
        <table id="clientes">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Complemento</th>
                    <th>CEP</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados ?>
            </tbody>
        </table>
    </section>
</main>