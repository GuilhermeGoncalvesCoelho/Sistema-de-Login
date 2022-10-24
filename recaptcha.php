
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

		<div 
		class="g-recaptcha" data-sitekey="6LfqXQ0iAAAAACNc25y4g73cvpq7KcEmiPYbjtUz">
		</div>
		<input type="submit" name="eviar" onclick="return valida()">
		
	<script type="text/javascript">
		function valida(){
			if (grecaptcha.getResponse()=="") {
				alert("É necessário marcar a caixa de validação");
				return false;
			}
		}
	</script>

	<?php 
     if (isset($_POST['enviar'])){
     	
     	if (!empty($_POST['g-recaptcha-response'])){
     		
     		$url = "https://www.google.com/recaptcha/api/siteverify";
     		$secret = "6LfqXQ0iAAAAABFQwZenaj6keSqltVg_v3LFN6Mu";
     		$response = $_POST['g-recaptcha-response'];
     		$variaveis = "secret=".$secret."&response=".$response;

     		$ch = curl_init($url);
     		curl_setopt( $ch, CURLOPT_POST, 1);
     		curl_setopt( $ch, CURLOPT_POSTFIELDS, $variaveis);
     		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
     		curl_setopt( $ch, CURLOPT_HEADER, 0);
     		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
     		$resposta = curl_exec($ch);
     		print_r($resposta);
     	}
     }
	 ?>

	 <input type="submit" name="eviar" onclick="return valida()">