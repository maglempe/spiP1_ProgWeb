<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Página Inicial</title>
</head>

<body>
        <div class="container">
          <div class="jumbotron">
            <div class="row">
                <h2>CRUD em PHP <span class="badge badge-secondary">Lista de Contatos</span></h2>
            </div>
          </div>
            </br>
            <div class="row">
                <h4>Clique no botão verde abaixo para inserir um novo contato.</h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Id</th> -->
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'db.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM pessoa ORDER BY id DESC';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
			                // echo '<th scope="row">'. $row['id'] . '</th>';
                            echo '<td>'. $row['nome'] . '</td>';
                            echo '<td>'. $row['cpf'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="read.php?id='.$row['id'].'">Ver</a>';
                            echo ' ';
                            echo '<a class="btn btn-warning" href="update.php?id='.$row['id'].'">Editar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Deletar</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
                <p>
                <a href="create.php" class="btn btn-success">Adicionar</a>
                </p>
            </div>
        </div>
    
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
