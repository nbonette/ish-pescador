<table width="100%">
        <tr>
            <th width=25%><a href="#"><img src="img\ish.png" width=90%></a></th>
            <th width=25%><input type="text" name="procura_pro" id="procura_pro" required style="width: 200px; height: 30px;border-radius: 15px;" placeholder="Estou procurando..."></th>
            <th width=25%><img src="img\trest.png" width=45% class="imagem-menu" id="imagem-menu"></th>
        </tr>
</table>
<div id="menu" class="menu">
    <li><a href="#"><img src="img\inicio.png" width=17%>&nbsp;&nbsp;Início</a></li>
    <li><a href="#"><img src="img\avisos.png" width=17%>&nbsp;&nbsp;Avisos</a></li>
    <li><?php $codigo = $_SESSION['cod_pesc'];?><a href="cadastrar_produto.php?cod_pesc=<?php echo "$codigo"?>"><img src="img\compras.png" width=17%>&nbsp;&nbsp;Vender</a></li>
    <li><a href="#"><img src="img\favoritos.png" width=17%>&nbsp;&nbsp;Favoritos</a></li>
    <li><a href="#"><img src="img\historico.png" width=17%>&nbsp;&nbsp;Histórico</a></li>
    <li><a href="#"><img src="img\minhaconta.png" width=17%>&nbsp;&nbsp;Minha conta</a></li>
    <li><a href="#"><img src="img\contato.png" width=17%>&nbsp;&nbsp;Contato</a></li>
    <li><a href="#"><img src="img\resumo.png" width=17%>&nbsp;&nbsp;Resumo</a></li>
    <li><a href="#"><img src="img\vender.png" width=17%>&nbsp;&nbsp;Vender</a></li>
  </div>