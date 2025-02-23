<?php
include_once './Header.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';
?>

<div class="container">
    
    <form class="form-horizontal" id="cadUsuario" method="POST" action="../controle/ControleUsuario.php?op=salvar" onsubmit="return validarFormulario()">
    
        <div class="formulario-campos">
            <label>Nome</label>
            <input type="text" name="nm_usuario" id="nm_usuario" value="">
    
            <label>CPF</label>
            <input type="text" name="nr_cpf" id="nr_cpf" value="" maxlength="11">
        </div>
    
        <div class="formulario-campos">
            <label>Login</label>
            <input type="text" name="ds_login" id="ds_login" value="">

            <label>Senha</label>
            <input type="password" name="pw_senha" id="pw_senha" value="">
        </div>
    
        <div class="formulario-campos">
            <label>Email</label>
            <input type="text" name="ds_email" id="ds_email" value="">

            <label>Perfil</label>
            <select name="id_perfil" id="id_perfil">
                <option value="1">Administrador</option>
                <option value="2">Atendente</option>
                <option value="3">Desenvolvedor</option>
            </select>
        </div>
    
        <div class="formulario-campos">
            <label>Ativo ?</label>
            <input type="checkbox" name="ao_status" id="ao_status" value="1">
        </div>
    
        <div class="botoes">
            <button type="submit" class="">Salvar</button>
            <button type="button">Voltar</button>
        </div>
    </form>
</div>

<script>
    function validarFormulario() {
        let campos = ['nm_usuario', 'nr_cpf', 'ds_login', 'pw_senha', 'ds_email', 'id_perfil'];
        for (let campo of campos) {
            if (document.getElementById(campo).value.trim() === '') {
                alert('Por favor, preencha todos os campos obrigatórios.');
                return false;
            }
        }
    }
</script>

<?php
include_once 'Footer.php';
?>

<style>
    .formulario-campos{
        margin: 1em 30%;
    }

    .botoes{
        float: right;
        margin: 3em 47%;
       
    }
</style>
