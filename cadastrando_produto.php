<?php require_once("security.php")?>
<?php
    // Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $cod_tipoprod = $_POST["cod_tipoprod"];
    $qtd_prod = $_POST["qtd_prod"];
    $imagem_prod = $_POST["imagem_prod"];
    $descicao_prod = $_POST["descricao_prod"];
    $cod_pesc = $_POST["cod_pesc"];
  
}

$servername = "appish.mysql.dbaas.com.br";
$username = "appish";
$password = "Canis123#";
$dbname = "appish";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$sql="insert into produto (cod_tipoprod,cod_pesc,qtd_prod,imagem_prod,descicao_prod) VALUES ($cod_tipoprod,$cod_pesc,$qtd_prod,'$imagem_prod','$descicao_prod')";

if ($conn->query($sql) === TRUE) {

    header('Location: pescador.php?cod_pesc='. $cod_pesc);
    exit();
} 

else {
    echo "Erro ao adicionar registro". $conn->error;
}

$conn->close();
?>