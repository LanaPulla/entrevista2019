<?php 
include_once 'Header.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

$dao = new UsuarioDAO();
?>

<div class="conteudo">
    <div class="listagem" style="background: #fcfcfc; margin: 2em auto;width:85%;">
        <table>
            <thead>
                <tr>
                    <th width="35%">Nome</th>
                    <th width="10%">CPF</th>
                    <th width="35%">Email</th>
                    <th width="8%">Status</th>
                    <th width="40%">Data de Cadastro</th>
                    <th width="12%">Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($dao->listar() as $usuario) { ?>
                    <tr>
                    <td><?=$usuario->getNmUsuario()?></td>
                    <td><?=$usuario->getNrCpf()?></td>
                    <td><?=$usuario->getDsEmail()?></td>
                    <td><?=$usuario->getAoStatus() ? "Ativo" : "Inativo" ?></td>
                    <td><?=$usuario->getDtCadastro()?></td>
                    <td>
                        <a href="editar.php?id=<?=$usuario->getIdUsuario()?>" class="btn-editar">✏️</a>
                        <a href="excluir.php?id=<?=$usuario->getIdUsuario()?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">🗑️</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'Footer.php'; ?>

<style>
    thead{
        background-color: #006b85;
        color: #fff;
    }
    .btn-editar, .btn-excluir {
        display: inline-block;
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        margin: 2px;
    }

    .btn-editar {
        background-color: #4CAF50;
        color: white;
    }

    .btn-excluir {
        background-color: #f44336;
        color: white;
    }

    .btn-excluir:hover {
        background-color: #d32f2f;
    }

    .btn-editar:hover {
        background-color: #388e3c;
    }
</style>