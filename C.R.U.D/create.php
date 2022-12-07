

<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeErro = null;
    $cpfErro = null;
    $emailErro = null;


    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
        if (!empty($_POST['nome'])) {
            $nome = $_POST['nome'];
        } else {
            $nomeErro = 'Por favor digite o seu nome!';
            $validacao = False;
        }


        if (!empty($_POST['cpf'])) {
            $cpf = $_POST['cpf'];
        } else {
            $cpfErro = 'Por favor digite seu cpf!';
            $validacao = False;
        }


        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $emailErro = 'Por favor digite um endereço de email válido!';
                $validacao = False;
            }
        } else {
            $emailErro = 'Por favor digite um endereço de email!';
            $validacao = False;
        }
    }

//Inserindo no Banco:
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO pessoa (nome, cpf, email) VALUES(?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $cpf, $email));
        Banco::desconectar();
        header("Location: index.php");
    }
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
    <title>Adicionar Contato</title>
</head>

<body>
<div class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Contato </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="create.php" method="post">

                    <div class="control-group  <?php echo !empty($nomeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="nome" type="text" placeholder="Nome"
                                   value="<?php echo !empty($nome) ? $nome : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($cpfErro) ? 'error ' : ''; ?>">
                        <label class="control-label">CPF</label>
                        <div class="controls">
                            <input id="cpf" size="14" class="form-control" name="cpf" type="text" placeholder="Digite aqui seu CPF"
                                   value="<?php echo !empty($cpf) ? $cpf : ''; ?>">
                            <?php if (!empty($cpfErro)): ?>
                                <span class="text-danger"><?php echo $cpfErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($emailErro) ? '$emailErro ' : ''; ?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="email" type="text" placeholder="Seu e-mail"
                                   value="<?php echo !empty($email) ? $email : ''; ?>">
                            <?php if (!empty($emailErro)): ?>
                                <span class="text-danger"><?php echo $emailErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn btn-success">Adicionar</button>
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script src="js/bootstrap.js"></script>
</body>

</html>

