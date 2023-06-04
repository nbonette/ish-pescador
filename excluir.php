<?php require_once("security.php")?>
<?php
// Verifica se o ID do registro foi passado pela URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Conexão com o banco de dados
    $servername = "localhost"; // Nome do servidor do banco de dados
    $username = "root"; // Nome de usuário do bd
    $password = ""; // Senha do bd
    $dbname = "crud_fatec"; // Nome do bd

    // Cria a conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "DELETE FROM imc WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro de IMC excluído com sucesso!";
    } else {
        echo "Erro ao excluir registro de IMC: " . $conn->error;
    }

    // Fecha a conexão com o BD
    $conn->close();
}
?>
<br><a href="index.php"><img src=img/voltar.png width=20></a>