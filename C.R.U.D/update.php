<?php

require 'db.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {

    $nomeErro = null;
    $cpfErro = null;
    $emailErro = null;

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    
    //Validação
    $validacao = true;
    if (empty($nome)) {
        $nomeErro = 'Por favor digite o nome!';
        $validacao = false;
    }

    if (empty($email)) {
        $emailErro = 'Por favor digite o email!';
        $validacao = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErro = 'Por favor digite um email válido!';
        $validacao = false;
    }

    if (empty($cpf)) {
        $cpfErro = 'Por favor digite o cpf!';
        $validacao = false;
    }


    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE pessoa  set nome = ?, cpf = ?, email = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $cpf, $email, $id));
        Banco::desconectar();
        header("Location: index.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM pessoa where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nome'];
    $cpf = $data['cpf'];
    $email = $data['email'];
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.6.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.mask.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#cpf").mask("000.000.000-00");
        })
    </script>

    <title>Atualizar Contato</title>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Atualizar Contato </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="update.php?id=<?php echo $id ?>" method="post">

                    <div class="control-group <?php echo !empty($nomeErro) ? 'error' : ''; ?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input name="nome" class="form-control" size="50" type="text" placeholder="Nome"
                                   value="<?php echo !empty($nome) ? $nome : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="control-group <?php echo !empty($cpfErro) ? 'error' : ''; ?>">
                        <label class="control-label">CPF</label>
                        <div class="controls">
                            <input id="cpf" name="cpf" class="form-control" size="14" type="text" placeholder="cpf"
                                   value="<?php echo !empty($cpf) ? $cpf : ''; ?>">
                            <?php if (!empty($cpfErro)): ?>
                                <span class="text-danger"><?php echo $cpfErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($emailErro) ? 'error' : ''; ?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" class="form-control" size="40" type="text" placeholder="Email"
                                   value="<?php echo !empty($email) ? $email : ''; ?>">
                            <?php if (!empty($emailErro)): ?>
                                <span class="text-danger"><?php echo $emailErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Confirmar</button>
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/bootstrap.js"></script>
</body>

</html>
