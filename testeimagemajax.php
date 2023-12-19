<?php

	require_once("banco2.php");
    require_once("banco1.php");

    $extensao =strtolower(substr($_FILES['imagem']['name'],-4));
	$novoNome = md5(time()).$extensao; 
	$diretorio ="upload/";

	$query="INSERT INTO `imagens` (`id`, `nome`) VALUES (NULL, :nome)";

	$stmt = $db->prepare($query);
	$stmt->bindValue(':nome',$novoNome);

	if($stmt->execute()){
		move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novoNome);
		$saida = "show de bola";	
	}else{

		$saida = "deu bigode";
	}


	$resp = array(
		'saida' => $saida,

	);
	
	echo json_encode($resp);


?>