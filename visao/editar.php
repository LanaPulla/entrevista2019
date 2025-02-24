<?php 
include_once 'Header.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

$dao = new UsuarioDAO();
$usuario = null;

if (isset($_GET['id'])) {
    $usuario = $dao->buscarPorId($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario->setNmUsuario($_POST['nome']);
    $usuario->setNrCpf($_POST['cpf']);
    $usuario->setDsEmail($_POST['email']);
    $usuario->setIdPerfil($_POST['perfil']);
    $usuario->setAoStatus(isset($_POST['status']) ? 1 : 0);
    
    $dao->atualizar($usuario);
    header("Location: GuiUsuarios.php");
    exit;
}

if (!$usuario) {
    echo "<p>Usuário não encontrado.</p>";
    exit;
}
?>

<div class="conteudo">
    <div class="formulario">
        <h2>Editar Usuário</h2>
        <form method="POST">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?=$usuario->getNmUsuario()?>" required>

            <label>CPF:</label>
            <input type="text" name="cpf" value="<?=$usuario->getNrCpf()?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?=$usuario->getDsEmail()?>" required>
            
            <label>Status: Ativo <input type="checkbox" name="status" <?=$usuario->getAoStatus() ? 'checked' : ''?>> 
            </label>
            
            <label>Perfil</label>
            <select name="perfil" required>
        <option value="1" <?= $usuario->getIdPerfil() == 1 ? 'selected' : '' ?>>Administrador</option>
        <option value="2" <?= $usuario->getIdPerfil() == 2 ? 'selected' : '' ?>>Atendente</option>
        <option value="3" <?= $usuario->getIdPerfil() == 3 ? 'selected' : '' ?>>Desenvolvedor</option>
    </select>

            
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</div>

<?php 
    include_once 'Footer.php'; 
?>
<style>
    .formulario {
        width: 50%;
        margin: 2em auto;
        padding: 20px;
        background: #fcfcfc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    input, select, option {
        padding: 8px;
        width: 200px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    label {
        display: block;
        margin: 10px 0 5px;
    }

    input, button {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
    }

    button {
        background-color: #006b85;
        color: white;
        border: none;
        cursor: pointer;
        margin-top: 5px;
    }

    button:hover {
        background-color:rgb(20, 166, 202);
    }
</style>
