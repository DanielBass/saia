<?php
	
	function  coloracao( $inicial){
		$r='WHITE';
		$total = 0;
		$letra = substr($inicial, -12,1);
		
		switch($letra){

			case 'P':
				$total+=0;
			break;

			case 'N':
				$total+=2;
			break;

			default:
				$total+=0;
		}

		$letra = substr($inicial, -8,1);
		
		switch($letra){

			case 'T':
				$total+=0;
			break;

			case 'C':
				$total+=1;
			break;

			case 'P':
				$total+=2;
			break;

			default:
				$total+=0;
		}

		$letra = substr($inicial, -4,1);
		
		switch($letra){

			case 'P':
				$total+=0;
			break;

			case 'M':
				$total+=1;
			break;

			case 'G':
				$total+=2;
			break;

			default:
				$total+=0;
		}

		$letra = substr($inicial, -11,1);
		
		switch($letra){

			case 'D':
				$total+=2;
			break;

			case 'I':
				$total+=0;
			break;


			default:
				$total+=0;
		}

		$letra = substr($inicial, -7,1);
		
		switch($letra){

			case 'R':
				$total+=0;
			break;

			case 'I':
				$total+=2;
			break;

			default:
				$total+=0;
		}

		$letra = substr($inicial, -3,1);
		
		switch($letra){

			case 'B':
				$total+=0;
			break;

			case 'M':
				$total+=1;
			break;

			case 'A':
				$total+=2;
			break;

			default:
				$total+=0;
		}

		$letra = substr($inicial, -10,1);
		
		switch($letra){

			case 'L':
				$total+=0;
			break;

			case 'R':
				$total+=1;
			break;

			case 'E':
				$total+=2;
			break;

			default:
				$total+=0;
		}

		$letra = substr($inicial, -6,1);
		
		switch($letra){

			case 'P':
				$total+=2;
			break;

			case 'A':
				$total+=0;
			break;

			default:
				$total+=0;
		}

		$letra = substr($inicial, -2,1);
		
		switch($letra){

			case 'N':
				$total+=2;
			break;

			case 'A':
				$total+=0;
			break;

			default:
				$total+=0;
		}

		$letra = substr($inicial, -9,1);
		
		switch($letra){

			case 'C':
				$total+=0;
			break;

			case 'M':
				$total+=1;
			break;

			case 'L':
				$total+=2;
			break;

			default:
				$total+=0;
		}

		$letra = substr($inicial, -5,1);
		
		switch($letra){

			case 'F':
				$total+=0;
			break;

			case 'M':
				$total+=1;
			break;

			case 'O':
				$total+=2;
			break;

			default:
				$total+=0;
		}
	
		$letra = substr($inicial, -1,1);
		
		switch($letra){

			case 'I':
				$total+=2;
			break;

			case 'M':
				$total+=1;
			break;

			case 'E':
				$total+=0;
			break;

			default:
				$total+=0;
		}

		$c1=substr($inicial, -12,1);	
	
		if($c1=='N'){
			
			if($total>15){
				
				$r="RED";

			}else if($total> 7 && $total<= 15){

				$r= "YELLOW";

			}
		
		}else if($c1=='P'){
			
			if ($total>15){
				
				$r= "GREEN";

			}else if($total > 7 && $total<= 15){
				
				$r= "CYAN";

			}
		}

		return $r;

	}

	
	
?>