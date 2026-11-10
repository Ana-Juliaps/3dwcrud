<?php
require_once __DIR__ . '/../Modelo/ClassUsuario.php';
require_once __DIR__ . '/../Modelo/DAO/ClassUsuarioDAO.php';

function voltar($msg)
{
    header('Location: ../index.php?MSG=' . urlencode($msg));
    exit;
}

$acao = isset($_GET['ACAO']) ? $_GET['ACAO'] : '';

$classUsuarioDAO = new ClassUsuarioDAO();

switch ($acao) {
    case 'cadastrarUsuario':
        $novoUsuario = new ClassUsuario();
        $novoUsuario->setNome(@$_POST['nome']);
        $novoUsuario->setEmail(@$_POST['email']);

        if ($classUsuarioDAO->cadastrar($novoUsuario) === TRUE) {
            voltar('Usuario cadastrado com sucesso!');
        }
        voltar('Erro ao cadastrar usuario!');
        break;

    case 'alterarUsuario':
        $novoUsuario = new ClassUsuario();
        $novoUsuario->setIdUsuario(@$_POST['idex']);
        $novoUsuario->setNome(@$_POST['nome']);
        $novoUsuario->setEmail(@$_POST['email']);

        if ($classUsuarioDAO->alterarUsuario($novoUsuario) === TRUE) {
            voltar('Usuario atualizado com sucesso!');
        }
        voltar('Erro ao atualizar usuario!');
        break;

    case 'excluirUsuario':
        if (isset($_GET['idex'])) {
            if ($classUsuarioDAO->excluirUsuario($_GET['idex']) === TRUE) {
                voltar('Usuario excluido com sucesso!');
            }
        }
        voltar('Erro ao excluir usuario!');
        break;

    default:
        voltar('Acao invalida!');
        break;
}
