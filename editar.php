<?php require_once("security.php")?>
<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Conexão com o banco de dados
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $dbname = "crud_fatec";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Verifica se o formulário de edição foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os valores do formulário
        $nome = $_POST["nome"];
        $altura = $_POST["altura"];
        $peso = $_POST["peso"];

        $imc = $peso / ($altura * $altura);

        if ($imc > 18 && $imc < 25 ) {
            $indice = 'NORMAL';
        } 
        
        elseif ($imc > 25 && $imc < 30) {
            $indice = 'SOBREPESO';
        } 
        
        elseif ($imc > 30 && $imc < 40) {
            $indice = 'OBESIDADE';
        } 
        
        elseif ($imc > 40) {
            $indice = 'OBESIDADE GRAVE';
        }
        
        else $indice = 'ABAIXO DO NORMAL';


        $sql = "UPDATE imc SET nome = '$nome', altura = $altura, peso = $peso, imc = $imc, indice = '$indice' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Registro de IMC atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar registro de IMC: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM imc WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
        $altura = $row["altura"];
        $peso = $row["peso"];
    } else {
        echo "Registro de IMC não encontrado.";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>IMC - Editar Registro</title>
</head>
<body>
    <h1>Editar Registro de IMC</h1>
    <a href="index.php"><img src=img/voltar.png width=20></a>
    <br><br>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . '?id=' . $id; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>">
        <br><br>
        <label for="altura">Altura (m):</label>
        <input type="text" name="altura" id="altura" value="<?php echo $altura; ?>">
        <br><br>
        <label for="peso">Peso (kg):</label>
        <input type="text" name="peso" id="peso" value="<?php echo $peso; ?>">
        <br><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>