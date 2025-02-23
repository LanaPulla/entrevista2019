<?php
include_once '../base_dir.php';
include_once DIR_UTIL . 'Define.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Entrevista</title>
        <link href="../css/style.css" rel="stylesheet">
        <link type='text/css' rel='stylesheet' href='../css/font.css'/>
        <style>
            .menu {
                display: flex;
                justify-content: center;
                gap: 20px;
                padding: 10px;
                background-color: #006b85;
            }
            .menu a {
                text-decoration: none;
                color: white;
                background-color: #004f63;
                padding: 10px 20px;
                border-radius: 5px;
                transition: background 0.3s;
            }
            .menu a:hover {
                background-color:rgb(20, 166, 202);;
            }
        </style>
    </head>
    <body> 
        <header>
            <h1>Entrevista - Desenvolvimento Canoastec</h1>
            <nav class="menu">
                <a href="GuiCadastroUsuario.php">Cadastro Usuário</a>
                <a href="GuiUsuarios.php">Lista Usuários</a>
            </nav>
        </header>
        <hr>
