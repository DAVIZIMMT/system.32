<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consulta de Dados</title>
    <style>
        @font-face {
        font-family: "mf";
        src: url('Gameplay.ttf') format('truetype');
        }
        body {
            background: linear-gradient(to right,#ff00cc,#aa00ff);
            margin: 0;
        }
        h1 {
            font-family: mf;
            font-size: 130px;
            margin:100px;
            color: white;
            
        }
        .tabela {
            left: 0px;
            top: 0px;
            
            width: 100%;
            height: 100%;
            
            
            
            display: flex;
            flex-direction: column;
            
            align-items: center;
        }
        .ct {
            font-family: Monospace;
            font-size: 25px;
            color:white;
            border-block-color: white;
        }
        th {
            border: 3px solid white;
            padding: 5px;
            color:white;
            font-family: bold;
            font-weight: bold;
            font-size: 30px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td {
            border: 3px solid white;
            padding: 5px;
            white-space: normal;
        }
    </style>
</head>
<body>
    <div class="tabela">
        <h1>SYSTEM.32</h1>

        <?php
        // Configurações do banco de dados
        $servername = "192.168.6.102";
        $username = "root";
        $password = "root";
        $dbname = "DADOS";

        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Consulta no banco de dados
        $id = $_GET["id"];

        if ($id == '') {
            $sql = "SELECT nome, cpf, telefone FROM registros";
        } else {

            $sql = "
        SELECT nome, cpf, telefone FROM registros where nome like '%$id%'";

        }
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibe os resultados em uma tabela
            echo "<table>";
            echo "<tr><th>Nome</th><th>Cpf</th><th>Telefone</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr class='ct'>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["cpf"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhum resultado encontrado.";
        }

        // Fecha a conexão
        $conn->close();
        ?>
    </div>
</body>
</html>