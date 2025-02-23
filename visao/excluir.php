<?php 
include_once 'Header.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

$dao = new UsuarioDAO();

if (isset($_GET['id'])) {
    $dao->excluir($_GET['id']);
    header("Location: GuiUsuarios.php");
    exit;
} else {
    echo "<p>ID inválido.</p>";
}
?>
