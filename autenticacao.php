<?php
// Parâmetros de conexão com o banco de dados
$servername = "appish.mysql.dbaas.com.br";
$username = "appish";
$password = "Canis123#";
$dbname = "appish";

// Dados de login fornecidos pelo usuário
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

// Criando uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Preparando a consulta para verificar se o usuário e senha são válidos
$sql = "SELECT cod_pesc FROM pescador WHERE cpf_pesc = ? AND senha_pesc = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $cpf, $senha);
$stmt->execute();
$stmt->bind_result($codigo);
$stmt->fetch();

// Verificando se a consulta retornou algum resultado
if ($codigo) {
    // Iniciar a sessão
    session_start();

    // Armazenar o código do pescador na sessão
    $_SESSION['cod_pesc'] = $codigo;

    // Autenticação bem-sucedida, redirecionar para pescador.php
    header("Location: pescador.php");
    exit();
} else {
    // Autenticação falhou
    die("CPF ou senha inválido!<a href='javascript:history.back()'> #VOLTAR# </a>");
}

// Fechando a conexão com o banco de dados
$stmt->close();
$conn->close();
?>