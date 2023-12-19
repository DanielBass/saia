<?php
if(!isset($_SESSION)){
 	session_start();
 	}  

 	echo('<div class="content float-letf">
					<div class="row">
						<div class="col-md-3 ml-auto" >
							<div class="alert alert-danger" role="alert">
  								<h5 class="alert-heading">Erro!</h5>
  								<p>Verifique sua senha</p>
  								<hr>
							</div>
						</div>
					</div>
				</div>');
 ?>