<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .col-11{
            margin: 0 1rem;
        }
    </style>
  </head>
  <body style="background-color: grey;">
      <div class="container" style="background-color: white; padding: 0;">
     <nav class="navbar navbar-expand-lg bg-primary"  data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">SISTEMA WEB</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item">
                        <a class="nav-link" href="index.php" style="color: white;">Cadastrar</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link "  href='consulta.php'  style="color: white; opacity: 0.5;" >Consultar</a>
                      </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

        <div class="row">
            <div class="col descricao">
           <h2> <font face="Times"> Consulta de Dados </font> <br /></>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Origem</th>
                            <th scope="col">Data de Contato</th>
                            <th scope="col">Observação</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        define('MYSQL_HOST', 'localhost:3306');
                        define('MYSQL_USER', 'root');
                        define('MYSQL_PASSWORD', '');
                        define('MYSQL_DB_NAME', 'cadastro');

                        try {
                            $pdo = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);

                        } catch (PDOException $ex) {
                            echo "Erro ao tentar fazer a conexão com MYSQL: " . $ex->getMessage();
                        }

                        $sql = "SELECT * FROM `dados`";
                        $result = $pdo->query($sql);
                        $registros = $result->fetchAll();

                        for ($i = 0; $i < count($registros); $i++) {
                            $data = date_create($registros[$i]['dataContato']);
                            $data = date_format($data , 'd/m/Y');

                            echo "<tr>";
                            echo "<td>" . $registros[$i]['nome'] . "</td>";
                            echo "<td>" . $registros[$i]['telefone'] . "</td>";
                            echo "<td>" . $registros[$i]['origem'] . "</td>";
                            echo "<td>" . $registros[$i]['dataContato'] . "</td>";
                            echo "<td>" . $registros[$i]['observacao'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>