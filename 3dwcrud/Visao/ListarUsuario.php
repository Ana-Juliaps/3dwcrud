<?php
require_once __DIR__ . '/../Modelo/DAO/ClassUsuarioDAO.php';

$classUsuarioDAO = new ClassUsuarioDAO();
$usuarios = $classUsuarioDAO->listaUsuario();
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    .lista-usuarios { max-width: 760px; margin: 0 auto; font-family: "Press Start 2P", "Courier New", monospace; font-size: 11px; line-height: 1.6; }
    .lista-usuarios h2 { color: #ff5fb0; text-align: center; font-size: 16px; text-shadow: 3px 3px 0 #7a1e5c, 6px 6px 0 #1a0526; }
    .tabela-usuarios { width: 100%; border-collapse: separate; border-spacing: 0; background: #ffe3f1; color: #5a1040; border: 4px solid #1a0526; box-shadow: 0 0 0 4px #ff5fb0, 10px 10px 0 4px #1a0526; }
    .tabela-usuarios th { background: #ff5fb0; color: #fff; padding: 12px 10px; text-align: left; border-bottom: 4px solid #1a0526; text-shadow: 2px 2px 0 #7a1e5c; }
    .tabela-usuarios td { padding: 10px; border-bottom: 4px dashed #ffb3d9; }
    .tabela-usuarios tbody tr:last-child td { border-bottom: 0; }
    .tabela-usuarios tbody tr:nth-child(even) { background: #ffd0e8; }
    .tabela-usuarios tbody tr:hover { background: #ff9ccf; }
    .tabela-usuarios a { color: #c2185b; text-decoration: none; }
    .tabela-usuarios a:hover { color: #1a0526; background: #fff; }
</style>
<div class="lista-usuarios">
<h2>Lista de Usuários</h2>
<table class="tabela-usuarios">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($usuarios)): ?>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['idUsuario']) ?></td>
                <td><?= htmlspecialchars($u['nome']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td>
                    <a href="index.php?idex=<?= urlencode($u['idUsuario']) ?>">Editar</a> |
                    <a href="Controle/ControleUsuario.php?ACAO=excluirUsuario&idex=<?= urlencode($u['idUsuario']) ?>"
                       onclick="return confirm('Deseja excluir este usuário?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">Nenhum usuário cadastrado.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
</div>