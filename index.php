<html>
<head>
    <style>
        @font-face {
            font-family: "mf";
            src: url('Gameplay.ttf') format('truetype');
        }
        @font-face{
            font-family: "pesq";
            src: url('Android_7.ttf') format('truetype');
        }
        body {
            background: linear-gradient(to right,#ff00cc,#aa00ff);
            margin: 0;
        }
        h1 {
            font-family: mf;
            font-size: 130px;
            margin: 100px;
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
        input {
            width: 650px;
            height: 95px;
            font-family: Monospace;
            font-size: 50px;
            margin: 50px;
            background: white;
            border: 0;
        }
        #pesq{
            font-family: pesq;
            font-size: 80px;
            color: #ff00cc;
            text-align: center;
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

        <form method="GET" action="register.php">
            <input type="text" name="id" /><br>
            <input id="pesq" type="submit" value="Pesquisar" />
        </form>

        <?php
        // Configurações do banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "DADOS";

        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Consulta no banco de dados
        $id = isset($_GET["id"]) ? $_GET["id"] : '';

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
