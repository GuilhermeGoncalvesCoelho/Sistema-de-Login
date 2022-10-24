<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Esqueci minha senha</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body style="font-family: 'Julius Sans One', sans-serif;color:#fff;background-image: url('img/placa.jpg');background-position: center center;background-size: cover;background-attachment: fixed;height:auto;width: 100%">
<div class="container">
 <div class="row">
  <div class="col-md-5 offset-md-3 mt-5">
   <div class="bg-transparent">
	<div class="card-body">
	 <h5 class="card-title">Para recuperar a senha informe o E-mail Cadastrado</h5>
	 <br>
       <form action="recup.php" method="POST">
        <div class="mb-3">
		  <input type="email" name="email" placeholder="E-mail" class="form-control">
		  <br>

		          <!--inicio recaptcha -->
				<script 
				 src="https://www.google.com/recaptcha/api.js" async defer>
				</script>
				<div 
				 class="g-recaptcha" data-sitekey="6LfqXQ0iAAAAACNc25y4g73cvpq7KcEmiPYbjtUz">
				</div>
				<br>
				<button type="submit"  name="Enviar" class="btn btn-info" onclick="return valida()" >Enviar</button>
								
				<script type="text/javascript">
						function valida(){
						    if (grecaptcha.getResponse()=="") {
								alert("É necessário marcar a caixa de validação");
								    return false;
							}
						}
				</script>

				<?php 
					if (isset($_POST['Enviar'])){
							     	
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
							curl_exec($ch);
						}
					}
				?>
					<!--fim recaptcha -->
	    </div>
       </form>
    </div>
   </div>
  </div>
 </div>
</div>
</body>
</html>

    