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

            <label>Status:</label>
            <input type="checkbox" name="status" <?=$usuario->getAoStatus() ? 'checked' : ''?>> Ativo

            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</div>

<?php include_once 'Footer.php'; ?>

<style>
    .formulario {
        width: 50%;
        margin: 2em auto;
        padding: 20px;
        background: #fcfcfc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    }

    button:hover {
        background-color: #005a6b;
    }
</style>
