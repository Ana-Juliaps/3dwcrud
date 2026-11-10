<?php
require_once __DIR__ . '/../Modelo/ClassUsuario.php';
require_once __DIR__ . '/../Modelo/DAO/ClassUsuarioDAO.php';

// Modo edição: se vier ?idex=ID na URL, carrega o usuário para preencher o formulário
$id    = '';
$nome  = '';
$email = '';
$acao  = 'cadastrarUsuario';
$textoBotao = 'Cadastrar';

if (isset($_GET['idex']) && $_GET['idex'] !== '') {
    $dao = new ClassUsuarioDAO();
    $usuario = $dao->buscarusuario($_GET['idex']);
    if ($usuario) {
        $id    = $usuario->getIdUsuario();
        $nome  = $usuario->getNome();
        $email = $usuario->getEmail();
        $acao  = 'alterarUsuario';
        $textoBotao = 'Alterar';
    }
}
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    body {
        background-color: #2b0a3d;
        background-image:
            linear-gradient(45deg, #3a1052 25%, transparent 25%, transparent 75%, #3a1052 75%),
            linear-gradient(45deg, #3a1052 25%, transparent 25%, transparent 75%, #3a1052 75%);
        background-size: 32px 32px; background-position: 0 0, 16px 16px;
        font-family: "Press Start 2P", "Courier New", monospace; font-size: 12px; line-height: 1.6;
        color: #ffd6ec; margin: 0; padding: 24px;
    }
    h1 { color: #ff5fb0; text-align: center; font-size: 22px; text-shadow: 4px 4px 0 #7a1e5c, 8px 8px 0 #1a0526; }
    hr { border: 0; height: 8px; margin: 32px auto; max-width: 760px; background: repeating-linear-gradient(90deg, #ff5fb0 0 8px, transparent 8px 16px); }
    .form-cad { background: #ffe3f1; color: #5a1040; max-width: 420px; margin: 0 auto; padding: 24px 28px; border: 4px solid #1a0526; box-shadow: 0 0 0 4px #ff5fb0, 10px 10px 0 4px #1a0526; }
    .form-cad label { color: #c2185b; }
    .form-cad input[type="text"], .form-cad input[type="email"] { width: 100%; box-sizing: border-box; padding: 10px; margin-top: 8px; border: 4px solid #1a0526; background: #fff; color: #5a1040; font-family: inherit; font-size: 12px; outline: none; }
    .form-cad input:focus { background: #fff0f8; border-color: #ff5fb0; box-shadow: 4px 4px 0 #1a0526; }
    .form-cad button { background: #ff5fb0; color: #fff; border: 4px solid #1a0526; padding: 12px 18px; font-family: inherit; font-size: 12px; cursor: pointer; box-shadow: 4px 4px 0 #1a0526; text-shadow: 2px 2px 0 #7a1e5c; }
    .form-cad button:hover { background: #ff82c4; }
    .form-cad button:active { transform: translate(4px, 4px); box-shadow: none; }
    .form-cad a { color: #c2185b; margin-left: 12px; }
    .form-cad ::placeholder { color: #d89ab8; }
</style>
<form class="form-cad" action="Controle/ControleUsuario.php?ACAO=<?= $acao ?>" method="post">
    <input type="hidden" name="idex" value="<?= htmlspecialchars($id) ?>">

    <p>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required
               value="<?= htmlspecialchars($nome) ?>">
    </p>

    <p>
        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required
               value="<?= htmlspecialchars($email) ?>">
    </p>

    <p>
        <button type="submit"><?= $textoBotao ?></button>
        <?php if ($acao === 'alterarUsuario'): ?>
            <a href="index.php">Cancelar</a>
        <?php endif; ?>
    </p>
</form>