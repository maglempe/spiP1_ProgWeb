<?php
require 'db.php';

$id = 0;

if(!empty($_GET['id']))
{
    $id = $_REQUEST['id'];
}

if(!empty($_POST))
{
    $id = $_POST['id'];

    //apagar registro do banco:
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM pessoa where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Banco::desconectar();
    header("Location: index.php");
}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title>Deletar Contato</title>
    </head>

    <body>
        <div class="container">
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well">Excluir Contato</h3>
                </div>
                <form class="form-horizontal" action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <div class="alert alert-danger"> Deseja excluir o contato?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <a href="index.php" type="btn" class="btn btn-default">Não</a>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/bootstrap.js"></script>
    </body>

    </html>
