<?php
session_start();
if (!isset($_SESSION['cod_pesc'])) {
    // O usuário não está autenticado, redirecione para a página de login
    header("Location: index2.php");
    exit;
}
?>