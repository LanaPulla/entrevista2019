<?php 
include_once 'Header.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

$dao = new UsuarioDAO();

$nomeFiltro = isset($_GET['nome']) ? trim($_GET['nome']) : '';
$cpfFiltro = isset($_GET['cpf']) ? trim($_GET['cpf']) : '';


$cpfFiltro = substr($cpfFiltro, 0, 11);

$filtros = "";
if (!empty($nomeFiltro)) {
    $filtros .= " AND u.nm_usuario LIKE '%$nomeFiltro%'";
}
if (!empty($cpfFiltro)) {
    $filtros .= " AND u.nr_cpf LIKE '%$cpfFiltro%'";
}

$usuarios = $dao->listar($filtros);

function formatarCpf($cpf) {
    
    $cpf = preg_replace('/\D/', '', $cpf);

    
    if (strlen($cpf) == 11) {
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }

    return $cpf; 
}


?>

<div class="conteudo">
    <!-- Área de Filtro -->
    <form method="GET" action="GuiUsuarios.php" class="filtro-form">
        <input type="text" name="nome" placeholder="Buscar por Nome" value="<?=$nomeFiltro?>">
        <input type="text" name="cpf" placeholder="Buscar por CPF" value="<?=$cpfFiltro?>" maxlength="11">
        <button type="submit" class="filtrar-filtro"> Filtrar</button>
        <a href="GuiUsuarios.php" class="limpar-filtro">Limpar</a>
    </form>

    <div class="listagem" style="background: #fcfcfc; margin: 2em auto; width:85%;">
        <table>
            <thead>
                <tr>
                    <th width="20%">Nome</th>
                    <th width="20%">Perfil</th>
                    <th width="10%">CPF</th>
                    <th width="25%">Email</th>
                    <th width="8%">Status</th>
                    <th width="40%">Data de Cadastro</th>
                    <th width="12%">Ações<th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($usuarios)) { ?>
                    <?php foreach ($usuarios as $usuario) { ?>
                        <tr>
                            <td><?=$usuario->getNmUsuario()?></td>
                            <td><?=$usuario->getIdPerfil() == 1 ? 'Administrador' : ($usuario->getIdPerfil() == 2 ? 'Atendente' : ($usuario->getIdPerfil() == 3 ? 'Desenvolvedor' : 'Desconhecido'))?></td>                            
                            <td><?= formatarCpf($usuario->getNrCpf()) ?></td>
                            <td><?=$usuario->getDsEmail()?></td>
                            <td><?=$usuario->getAoStatus() ? "Ativo" : "Inativo" ?></td>
                            <td><?=$usuario->getDtCadastro()?></td>
                            <td>
                                <a href="editar.php?id=<?=$usuario->getIdUsuario()?>" class="btn-editar">✏️</a>
                                <a href="excluir.php?id=<?=$usuario->getIdUsuario()?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">🗑️</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">Nenhum usuário encontrado</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'Footer.php'; ?>

<style>
    thead {
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
        background-color: #388e3c;
        color: white;
    }

    .btn-excluir {
        background-color:rgb(126, 45, 39);
        color: white;
    }

    .btn-excluir:hover {
        background-color: #d32f2f;
    }

    .btn-editar:hover {
        background-color: #4CAF50;
    }


    .filtro-form {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .filtro-form input {
        padding: 8px;
        width: 200px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .filtro-form button {
        padding: 8px 15px;
        background-color: #006b85;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;

    }

    .filtro-form .limpar-filtro {
        padding: 8px 15px;
        background-color:rgb(158, 34, 26);
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .filtro-form .limpar-filtro:hover {
        background-color: #d32f2f;
    }
    
    .filtro-form .filtrar-filtro:hover {
        background-color:rgb(20, 166, 202);
    }
</style>
