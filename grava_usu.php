<?php

error_reporting(E_ALL| E_STRICT);

include("conexao.php");

//$charset= "iso-8859-1";
$charset = "utf8";
$mime = "text/html";
$nome = $_POST['nome']; 

header ("Content-Type: $mime; charset=$charset");
//echo $nome;


if(isset($_POST['idUsuario']))
{
    $cmdSQL = mysqli_query($conexao, "select * from cadastro where IdUsuario='".$_POST['idUsuario']."'");
    $res = mysqli_query($conexao, "select * from cadastro where IdUsuario='".$_POST['idUsuario']."'");
    $linhas = mysqli_num_rows($res);
	
	$cod = $_POST['idUsuario'];
	//echo $cod;

    if($linhas > 0)
    {
        echo "<span style = 'color:red; font-weight: bold'> Indispon&iacute;vel</span>";
    }
    
	else
    {
        echo "<span style' color:green; font-weight: bold'> Dispon&iacute;vel</span>";
    }

}


if(isset($_POST['submit']))
{
    include_once('conexao.php');

    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];

    //$result = mysqli_query($conexao, "INSERT INTO cadastro (senha,nome,endereco,cidade,uf,cep) VALUES ($senha,$nome,$endereco,$cidade,$uf,$cep)");
	$result = mysqli_query($conexao, "INSERT INTO cadastro (senha, nome, endereco, cidade, uf, cep) VALUES ('$senha','$nome','$endereco','$cidade','$uf','$cep')");
	mysqli_query($conexao, $result);
	echo "Inserido com Sucesso";
	//var_dump($result); 
}

else{
	echo "Falha na Inser��o";
}



 mysqli_close($conexao);
?>