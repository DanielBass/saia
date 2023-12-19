<?php

	if(!isset($_SESSION)){
 	session_start(); 
 	}  
        	
	if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        $idUsuario=$_SESSION ['idUsuario'];
        
        
    }else{

        header("Location: login.php");
    }
    require_once("banco2.php");
	require_once("banco1.php");


	

				
			if(isset($_POST['nomeAtividade']) && !empty($_POST['nomeAtividade'])){
				$idProcesso=$_SESSION['processoD'];
				$idEtapa=$_SESSION['etapaD'];
				$nomeAtividade=$_POST['nomeAtividade'];
				$obs = $_POST['observacao'];
				$novoNome="";

				 if(isset($_FILES['imagemItem']) && !empty($_FILES['imagemItem']['name'])) {
				 	$x= explode(".",$_FILES['imagemItem']['name']);
				 	$extensao = ".".$x[1];
				 	$novoNome = md5(time()).$extensao; 
				 	$diretorio ="upload/";

				 	if(!(move_uploaded_file($_FILES['imagemItem']['tmp_name'], $diretorio.$novoNome))){
				 			$json[]=array(
                				'status'=> 'erro',
                				'mensagem'=> 'erro ao receber a imagem',
                				'alert'=> 'alert-danger' 

            				);	
				 		
				 	}
				 		
				 	
				 }
					
				try{
					
					$sql=$db->query("SELECT * FROM atividades WHERE nomeAtividade ='$nomeAtividade' AND id_usuario = '$idUsuario' AND id_processo ='$idProcesso' AND id_etapa ='$idEtapa'");

						
					 if($sql->rowCount()>0 && $_POST['item']== 'Particulas sólidas'){
				 	
				 		$json[]=array(
                				'status'=> 'erro',
                				'mensagem'=> 'atividade já cadastrada com esse nome',
                				'alert'=> 'alert-danger', 
                				'res'=> '1'

            				);

            				$jsonString =json_encode($json);
       						echo $jsonString;
       						return 0;

					}else if ($_POST['item']== 'Particulas sólidas'){
						 
						 

					 	$query="INSERT INTO `atividades` (`id_atividade`, `nomeAtividade`,  `id_usuario`, `id_processo`, `id_etapa`) VALUES (NULL, :atividade,  :usuario,:processo,:etapa)";
					 
					 	
					 	$stmt = $db->prepare($query);
					 	$stmt->bindValue(':atividade',$nomeAtividade);
						$stmt->bindValue(':usuario', $idUsuario);
						$stmt->bindValue(':processo', $idProcesso);
						$stmt->bindValue(':etapa', $idEtapa);
						 // $json[]=array(
       //           				'status'=> 'Sucesso',
       //           				'mensagem'=> 'nova atividade cadastrada com sucesso',
       //           				'alert'=> 'alert-success' 

       //       				);

       //       				$jsonString =json_encode($json);
       //  					echo $jsonString;
						 if($stmt->execute()){
							
											 	
						  }else{
							//  $json[]=array(
                 			// 	'status'=> 'erro',
                 			// 	'mensagem'=> 'perdemos a conexão com nosso banco de dado',
                 			// 	'alert'=> 'alert-danger' 

             				// );

             				$jsonString =json_encode($json);
        					echo $jsonString;
						 }
					 			
					 	
					}
						
				

				}catch (PDOException $e){
					echo "Falhou: ".$e->getMessage();
				}

			}

			if(isset($_POST['item']) && !empty($_POST['item'])){
				//echo($_POST['radiovalor']);
				$iniciais=" ";
				  $item=$_POST['item'];
				  
				  $iniciais=$iniciais.$_POST['radiovalor'];
				  $iniciais=$iniciais.$_POST['radioordem'];
				  $iniciais=$iniciais.$_POST['radioespacial'];
				  $iniciais=$iniciais.$_POST['radiotemporal'];
				  $iniciais=$iniciais.$_POST['radiodinamica'];
				  $iniciais=$iniciais.$_POST['radioplastica'];
				  $iniciais=$iniciais.$_POST['radiocumulatividade'];
				  $iniciais=$iniciais.$_POST['radiomagnitude'];
				  $iniciais=$iniciais.$_POST['radiosignificancia'];
                  $iniciais=$iniciais.$_POST['radiosensibilidade'];
                  $iniciais=$iniciais.$_POST['radiocondicoes'];
                  $iniciais=$iniciais.$_POST['radioresistencia'];
                  //echo( $iniciais);

                 $sql=$db->query("SELECT * FROM atividades  WHERE id_usuario = '$idUsuario' AND id_processo ='$idProcesso' AND id_etapa ='$idEtapa' ORDER BY id_atividade DESC LIMIT 1");

                 if($sql->rowCount()>0){
                 	foreach ($sql->fetchAll() as $item2){
                 		$idAtividade=$item2['id_atividade'];
                 	}
                 	$query ="INSERT INTO `itens` (`id_item`,`id_atividade`, `item`, `iniciais`,`obs`,`imagem`) VALUES (NULL, :atividade, :item, :iniciais, :obs,:imagem)";

                 	$stmt = $db->prepare($query);
				 	$stmt->bindValue(':atividade',$idAtividade);
				 	$stmt->bindValue(':item',$item);
				 	$stmt->bindValue(':iniciais',$iniciais);
				 	$stmt->bindValue(':obs',$obs);
				 	$stmt->bindValue(':imagem',$novoNome);


				 	if($stmt->execute()){
						$json[]=array(
                			'status'=> 'sucesso',
                			'mensagem'=> 'itens cadastrado com sucesso',
                			'alert'=> 'alert-success' 

            				);

            				$jsonString =json_encode($json);
       						echo $jsonString;	

       						$sql4=$db->query("SELECT  id_processo, id_etapa from atividades ORDER BY id_atividade DESC LIMIT 1"); 

								 if($sql4->rowCount()>0){
                 			
                 			 		foreach ($sql4->fetchAll() as $item4){
                 			 		
                 			 			$_SESSION['buscaEtapa'] = $item4['id_etapa'];	
                 					 	$_SESSION['buscaProcesso'] = $item4['id_processo'];
                 					}
                 			 	}			 		
				 	}else{
				 		$json[]=array(
                				'status'=> 'erro',
                				'mensagem'=> 'perdemos a conexão com nosso banco de dado',
                				'alert'=> 'alert-danger' 

            				);

            				$jsonString =json_encode($json);
       						echo $jsonString;
				 	}


                }


			}

	
?>