<?php 

	if(!isset($_SESSION)){
 	session_start();
 	}  
        	 
	if(isset($_SESSION ['idUsuario']) && empty($_SESSION ['idUsuario'])==false ){
        $idUsuario= $_SESSION ['idUsuario'];
        $idAtividade = $_SESSION['idAtividade'];
  
    }else{

        header("Location: login.php");
    }
    require_once("banco2.php");
	require_once("banco1.php");


	        

			
				
			if(isset($_POST['nomeProcessoA']) && !empty($_POST['nomeProcessoA']) && isset($_POST['nomeEtapaA']) && !empty($_POST['nomeEtapaA']) && isset($_POST['nomeAtividade']) && !empty($_POST['nomeAtividade'])){
				$idProcesso=$_POST['nomeProcessoA'];
				$idEtapa=$_POST['nomeEtapaA'];
				$nomeAtividade=$_POST['nomeAtividade'];
				$obs = $_POST['observacao'];
				$novoNome = "";


				if(isset($_FILES['imagemItem']) && !empty($_FILES['imagemItem']['name'])) {
				 	$x= explode(".",$_FILES['imagemItem']['name']);
				 	$extensao =".".$x[1];
				 	$novoNome = md5(time()).$extensao; 
				 	$diretorio ="upload/";

				 	if(!(move_uploaded_file($_FILES['imagemItem']['tmp_name'], $diretorio.$novoNome))){
				 			$json[]=array(
                				'status'=> 'erro',
                				'mensagem'=> 'erro no servidor',
                				'alert'=> 'alert-danger' 

            				);	
				 		
				 	}
				 		
				 	
				 }
					
				try{
						
							 
					$db->query("UPDATE atividades SET nomeAtividade = '$nomeAtividade' WHERE id_atividade = '$idAtividade'");
					
						//echo ('oi');
						//echo($sql);
						//echo($obs);
					 
					 	
					
						
				

				}catch (PDOException $e){
					echo "Falhou: ".$e->getMessage();
				}

			}

			if(isset($_POST['itemAjax']) && !empty($_POST['itemAjax'])){
				

				//echo($_POST['radiovalor']);
				$iniciais=" ";
				  $item=$_POST['itemAjax'];

				  switch ($item) {
				  	
				  	case 1:
				  		$itemString ='Particulas sólidas';
				  	break;

				  	case 2:
				  		$itemString ='Gases e vapores';
				  	break;

				  	case 3:
				  		$itemString ='Contaminação da água';
				  	break;

				  	case 4:
				  		$itemString ='Contaminação do solo';
				  	break;

				  	case 5:
				  		$itemString ='Redução da diversidade';
				  	break;

				  	case 6:
				  		$itemString ='Economia Local';
				  	break;

				  	case 7:
				  		$itemString ='Infraestrutura';
				  	break;

				  	case 8:
				  		$itemString ='Tecnologia';
				  	break;

				  	case 9:
				  		$itemString ='Qualidade de vida';
				  	break;

				  	case 10:
				  		$itemString ='Saúde';
				  	break;

				  	case 11:
				  		$itemString ='Desenvolvimento Regional';
				  	break;

				  	case 12:
				  		$itemString ='Paisagimos';
				  	break;

				  	case 13:
				  		$itemString ='Qualidade do Produto Final';
				  	break;
				  }
				  
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
                  //echo $itemString;
                  $sql=$db->query("SELECT id_etapa,id_processo FROM etapas WHERE nomeEtapa = '$idEtapa'");

                  if($sql->rowCount()>0){
                  	
                  	foreach($sql->fetchAll() as $item){
                  		$idProcesso = $item['id_processo'];
                  		$idEtapa =	$item['id_etapa'];
                  		$_SESSION['nomeProcessoT']=$idProcesso;

                  	}
                  }


                  
                 $sql2=$db->query("SELECT * FROM atividades  WHERE id_usuario = '$idUsuario' AND id_processo ='$idProcesso' AND id_etapa ='$idEtapa' ORDER BY id_atividade DESC LIMIT 1");

                 if($sql2->rowCount()>0){

                 	foreach ($sql2->fetchAll() as $item2){
                 		//$idAtividade=$item2['id_atividade'];
                 		//echo ($idAtividade);
                 		$sql3=$db->query("SELECT * FROM itens WHERE id_atividade='$idAtividade' AND item = '$itemString'");
                 		if($sql3->rowCount()>0){
                 			
                 			$dado = $sql3->fetch();
                 			$verificao=$dado['imagem'];
                 			
                 			if($verificao == ""){


                 			}else{

                 				if($novoNome == ""){
                 					
                 					$novoNome =  $verificao;
                 				}
                 			}

                 			$query ="UPDATE  itens SET iniciais='$iniciais', obs='$obs',imagem='$novoNome' WHERE id_atividade='$idAtividade' AND item = '$itemString'";
                 			$db->query($query);

                 			$json[]=array(
                			'status'=> 'sucesso',
                			'mensagem'=> 'atividade alterada com sucesso',
                			'alert'=> 'alert-success'
                			 
            			);

            			$jsonString =json_encode($json);
       					echo $jsonString;

                 		}else{

      						$query ="INSERT INTO `itens` (`id_item`,`id_atividade`, `item`, `iniciais`, `obs`, `imagem`) VALUES (NULL, :atividade, :item, :iniciais,:obs,:imagem)";

      		            	$stmt = $db->prepare($query);
				 		 	$stmt->bindValue(':atividade',$idAtividade);
				 			$stmt->bindValue(':item',$itemString);
				 	 		$stmt->bindValue(':iniciais',$iniciais);
				 	 		$stmt->bindValue(':obs',$obs);
				 	 		$stmt->bindValue(':imagem',$novoNome);

				 	 		if($stmt->execute()){
				 	 			$json[]=array(
                			'status'=> 'sucesso',
                			'mensagem'=> 'atividade alterada com sucesso',
                			'alert'=> 'alert-success'
                			 
            			);

            			$jsonString =json_encode($json);
       					echo $jsonString;
				 	 		}else{
				 	 			echo("erro inesperado");
				 	 		}
           			
                 		}
                 		
                 		
                 		
                 	}


                }


			}

	
?>