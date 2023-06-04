<?php
    // Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $dtNasc = $_POST["data"];
    $rua = $_POST["rua"];
    $numero_casa = $_POST["numero_casa"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $cep = $_POST["cep"];
    $estado = $_POST["estado"];
    $crpa = $_POST["crpa"];

}

$servername = "appish.mysql.dbaas.com.br";
$username = "appish";
$password = "Canis123#";
$dbname = "appish";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$sql="insert into pescador (nome_pesc,cpf_pesc,senha_pesc,email_pesc,telefone_pesc,dtNasc_pesc,rua_pesc,numero_casa_pesc,bairro_pesc,cidade_pesc,cep_pesc,estado_pesc,crpa_pesc) VALUES ('$nome','$cpf','$senha','$email','$telefone','$dtNasc','$rua','$numero_casa','$bairro','$cidade','$cep','$estado','$crpa')";

if ($conn->query($sql) === TRUE) {

    header('Location: sucesso.php?cpf_pesc='. $cpf);
    exit();
} 

else {
    echo "Erro ao adicionar registro". $conn->error;
}

$conn->close();
?>