<?php
// Configurações do banco de dados
$servername = "appish.mysql.dbaas.com.br";
$username = "appish";
$password = "Canis123#";
$dbname = "appish";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Função de mergesort
function mergeSort(&$arr, $start, $end, $field)
{
    if ($start < $end) {
        $mid = ($start + $end) / 2;
        $mid = (int) $mid;
        
        mergeSort($arr, $start, $mid, $field);
        mergeSort($arr, $mid + 1, $end, $field);
        
        merge($arr, $start, $mid, $end, $field);
    }
}

// Função para mesclar duas sub-listas ordenadas
function merge(&$arr, $start, $mid, $end, $field)
{
    $leftSize = $mid - $start + 1;
    $rightSize = $end - $mid;
    
    $leftArr = [];
    $rightArr = [];
    
    for ($i = 0; $i < $leftSize; $i++) {
        $leftArr[$i] = $arr[$start + $i];
    }
    
    for ($j = 0; $j < $rightSize; $j++) {
        $rightArr[$j] = $arr[$mid + 1 + $j];
    }
    
    $i = 0;
    $j = 0;
    $k = $start;
    
    while ($i < $leftSize && $j < $rightSize) {
        // Comparar pelo campo "nome_cli"
        if ($leftArr[$i][$field] <= $rightArr[$j][$field]) {
            $arr[$k] = $leftArr[$i];
            $i++;
        } else {
            $arr[$k] = $rightArr[$j];
            $j++;
        }
        $k++;
    }
    
    while ($i < $leftSize) {
        $arr[$k] = $leftArr[$i];
        $i++;
        $k++;
    }
    
    while ($j < $rightSize) {
        $arr[$k] = $rightArr[$j];
        $j++;
        $k++;
    }
}

// Dados do banco de dados
$sql = "SELECT * FROM cliente";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Armazena os dados em um array
    $clientes = [];
    while ($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
    
    // Ordenando pelo campo "nome_cli"
    $field = "nome_cli";
    
    // Chamar o mergesort para ordenar o array $clientes
    mergeSort($clientes, 0, count($clientes) - 1, $field);
    
    // Exemplo de impressão dos resultados
    foreach ($clientes as $cliente) {
        echo $cliente[$field] . "<br>";
    }
} else

{
    echo "Nenhum cliente encontrado.";
}

// Fechando a conexão com o banco de dados
$conn->close();
?>