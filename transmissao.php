<?php
	include_once("funcoes.php");
	$TituloPage = $_SESSION['eventoNome'];

?>
<!DOCTYPE html>


<html lang="pt-br">
	<head>
	  <meta name="author" content="Douglas Chiodi - GVD Soluções Inteligentes">
	  <link rel="icon" href="imagens/favicon.ico">
	  <title>Gerenciador de Configuração - Prever</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script>
		function ajustaTamanho(p){
			var h = parseInt($(p).css("height").replace("px", ""));
			var w = parseInt($(p).css("width").replace("px", ""));
			
			if(h>w)
			{
				h = w*0.8149405772495756;
				$(p).css("height", h); 
			}
			else{
				w = h*1.23;
				$(p).css("width", w); 
			}
			
		}
		
		
		</script>
	</head>
	<body>

		<?php include 'menu.php'; ?>
		  
		<div class="container text-center">
		
		
		  <div class="row">
			<div class="col-sm-4"><img src="./imagens/icone.png" style="height:20vh"/></div>
			<div class="col-sm-8 fom-group">
				<div id="FramePriDiv" name="FramePriDiv" onload='ajustaTamanho(this)' style='-webkit-user-select: none;margin: auto;width:100%; height:480px;max-height:80vh'>
				<?php
				
					
				
					$options = array(
						CURLOPT_RETURNTRANSFER => true,     // return web page
						CURLOPT_HEADER         => false,    // don't return headers
						CURLOPT_FOLLOWLOCATION => true,     // follow redirects
						CURLOPT_ENCODING       => "",       // handle all encodings
						CURLOPT_USERAGENT      => "spider", // who am i
						CURLOPT_AUTOREFERER    => true,     // set referer on redirect
						CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
						CURLOPT_TIMEOUT        => 120,      // timeout on response
						CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
						CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
					);
	
					$c = curl_init($_SESSION['urlCamera']);
					
					 curl_setopt_array( $c, $options );
					curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
					//curl_setopt(... other options you want...)

					$html = curl_exec($c);
					$html = str_replace('poster', 'pastel', $html);
					$html = str_replace('https://mc.yandex.ru/metrika/tag.js', '', $html);
					if (curl_error($c))
						die(curl_error($c));

					// Get the status code
					$status = curl_getinfo($c, CURLINFO_HTTP_CODE);

					curl_close($c);
					echo $html;
                        //echo "<img style='-webkit-user-select: none;margin: auto;width:100%;' src='".$_SESSION['urlCamera']."' />"
						//echo "<iframe id='FramePri' name='FramePri' onload='ajustaTamanho(this)' style='-webkit-user-select: none;margin: auto;width:100%; height:480px;max-height:80vh' src='".$_SESSION['urlCamera']."' frameborder='0' allowfullscreen></iframe>"
				?>
				</div>
			</div>
		  </div>
		  
		</div>
<footer class="container-fluid text-center" style="background-color:#091742;position: fixed;bottom: 0px!important;width: 100vw;">
  <div class="row">
	<div class="col-sm-6 text-left"><img src="./imagens/iconeBranco2.png" style="height:3vh;margin:10px"/></div>
	<div class="col-sm-6 text-right"><a href="https://www.gvdsolucoes.com.br"><img src="./imagens/logo-branca.png" style="height:3vh;margin:10px"/></a></div>
  </div>
</footer>
	</body>
</html>
