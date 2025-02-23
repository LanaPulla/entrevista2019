<?php

include_once DIR_PERSISTENCIA . 'Conexao.class.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';

class UsuarioDAO {
    
    private $conexao = null;
    
    function __construct() {
    }
    
    function listar($filtros = '') {
        try{
            $query = ("SELECT * FROM usuario u WHERE 1=1 $filtros ORDER BY u.nm_usuario ASC");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);
            
            $usuarios = array();

            foreach ($array as $obj) {
                $usuario = new UsuarioVO();
                $usuario->setIdUsuario($obj['id_usuario']);
                $usuario->setNmUsuario($obj['nm_usuario']);
                $usuario->setNrCpf($obj['nr_cpf']);
                $usuario->setDsEmail($obj['ds_email']);
                $usuario->setDsLogin($obj['ds_login']);
                $usuario->setPwSenha($obj['pw_senha']);
                $usuario->setIdPerfil($obj['id_perfil']);
                $usuario->setAoStatus($obj['ao_status']);
                $usuario->setIdUsuarioinclusao($obj['id_usuarioinclusao']);
                $usuario->setIdUsuarioalteracao($obj['id_usuarioalteracao']);
                $usuario->setDtCadastro($obj['dt_cadastro']);
                $usuario->setDtAlteracao($obj['dt_alteracao']);
                $usuarios[] = $usuario;
            }
            $this->conexao = null;
            return $usuarios;
        }catch(Exception $e){
            echo "Erro ao buscar os Usuarios";
            return false;
        }
    }

 

    function cadastrar(UsuarioVO $usuario){
        try{

            $sql = "
                INSERT INTO usuario(
                    nm_usuario,
                    ds_email,
                    nr_cpf,
                    ds_login,
                    pw_senha,
                    id_perfil,
                    ao_status,
                    id_usuarioinclusao,
                    id_usuarioalteracao,
                    dt_cadastro,
                    dt_alteracao
                )VALUES(
                    '{$usuario->getNmUsuario()}',
                    '{$usuario->getDsEmail()}',
                    '{$usuario->getNrCpf()}',
                    '{$usuario->getDsLogin()}',
                    '{$usuario->getPwSenha()}',
                    '{$usuario->getIdPerfil()}',
                    '{$usuario->getAoStatus()}',
                    '{$usuario->getIdUsuarioInclusao()}',
                    '{$usuario->getIdUsuarioAlteracao()}',
                    now(),
                    now()
                )
            ";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;

        }catch(Exception $e){
            echo "Erro ao cadastrar o Usuario";
            return false;
        }
    }
    public function buscarPorId($id) {
        $sql = "SELECT * FROM usuario WHERE id_usuario = ?";
        $stmt = Conexao::connect()->prepare($sql);
        $stmt->execute([$id]);
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dados) {
            $usuario = new UsuarioVO();
            $usuario->setIdUsuario($dados['id_usuario']);
            $usuario->setNmUsuario($dados['nm_usuario']);
            $usuario->setNrCpf($dados['nr_cpf']);
            $usuario->setDsEmail($dados['ds_email']);
            $usuario->setAoStatus($dados['ao_status']);
            return $usuario;
        }
        return null;
    }

    public function atualizar($usuario) {
        $sql = "UPDATE usuario SET nm_usuario = ?, nr_cpf = ?, ds_email = ?, ao_status = ? WHERE id_usuario = ?";
        $stmt = Conexao::connect()->prepare($sql);
        return $stmt->execute([
            $usuario->getNmUsuario(),
            $usuario->getNrCpf(),
            $usuario->getDsEmail(),
            $usuario->getAoStatus(),
            $usuario->getIdUsuario()
        ]);
    }

    public function excluir($id) {
        $sql = "DELETE FROM usuario WHERE id_usuario = ?";
        $stmt = Conexao::connect()->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>