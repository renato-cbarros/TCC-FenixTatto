<?php
#Pasta dentro do pc
$path = "C:/Users/Administrador/Fenix Tattoo/Imagem_produto";
$diretorio = dir($path);
    while($arquivo = $diretorio -> read()){
	  $example4 = $arquivo;
	  $example4 = preg_replace("/[^0-9\s]/", "", $example4); 
		if (empty($example4)) {
		echo $example4;
		}else{
		$ta[] = $example4;
		}
   }
   $rta = count($ta);
   $cont = 1;
   while ($cont <= $rta){
   unlink("C:/Users/Administrador/Fenix Tattoo/Imagem_produto/".$cont.".jpg");
   $cont = 1 + $cont;
   }
   $diretorio -> close();

include 'conexao.php';
$sql = mysqli_query("Select * From produto");
while($exibe = mysqli_fetch_assoc($sql)){
  $t[] = $exibe['id_produto'] .'<br>';
}

$rt = count($t);
$r = 1;
while($r <= $rt){
echo $r;	
$arquivo_origem = "servidor/".$r.".jpg";
#Pasta dentro do servidor
$arquivo_destino = "C:/Users/Administrador/Fenix Tattoo/Imagem_produto/".$r.".jpg";

if (copy($arquivo_origem, $arquivo_destino))
{
echo "Arquivo copiado com Sucesso.";
}
else
{
echo "Erro ao copiar arquivo.";
}	
	$r = $r+1;	
}
?>