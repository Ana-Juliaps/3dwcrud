<!DOCTYPE html>
<html lang="en">
    <?php
    $msg = isset($_GET['MSG']) ? $_GET['MSG'] : '';
    if ($msg !== '') {
        echo "<script>alert(" . json_encode($msg) . ");</script>";
    }
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>Sistema de Cadastro de Alunos</h1>
    <?php
    include 'Visao/FormCadUsuario.php';
    echo"<hr>";
    include 'Visao/ListarUsuario.php';
    ?>
</body>
</html>