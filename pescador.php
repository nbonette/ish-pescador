<?php require_once("security.php")?>
<!DOCTYPE html>
<html>
<head>
<title>|><) ISH - Pescados da Pesca Artesanal</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }
  
  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  
  th {
    background-color: #d9faff;
    text-align: center;
  }
  
  a {
    text-decoration: none;
  }
  
  a:hover {
    text-decoration: underline;
  }
  
  h1 {
    font-size: 24px;
    margin-bottom: 20px;
  }
  
  .menu {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 120px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    padding: 12px;
    z-index: 1;
  }
  
  .imagem-menu {
    cursor: pointer;
  }

 </style>
</head>
<body bgcolor="#d9faff">
      
    <?php include 'cabeca.php'; ?>
    <script src="js/menu.js"></script>
    
    <?php
    require_once "conexao.php";
     
    $codigo = $_SESSION['cod_pesc'];

    $sql = "SELECT * FROM produto where cod_pesc=$codigo";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
                echo "<table border='0'>";
                
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td></td>";
            echo "<td><a href=#><img src=".$row["imagem_prod"]." width=100 height=100'><p align=center>".$row["qtd_prod"]." ".$row["unidade_prod"]."</a></td>";
            echo "<td>".$row["descicao_prod"]."</td>";
            echo "<td><a href=alterar_cadastro_produto.php?cod_prod=".$row["cod_prod"]."?imagem_prod=".$row["imagem_prod"]."?preco_prod=".$row["preco_prod"]."?descicao_prod=".$row["descicao_prod"]."?peso_prod=".$row["peso_prod"]."?cod_tipoprod=".$row["cod_tipoprod"]."><img src=img/editar.png width=25'></a></td>";
            echo "<td><a href=#?cod_prod=".$row["cod_prod"]."><img src=img/remover.png width=25'></a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum registro encontrado.";
    }
    
    $conn->close();
    ?>
        
</body>
</html>