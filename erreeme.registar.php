<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="pt-PT">
<head>
	<title>erreeme</title>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
	<meta http-equiv="Content-Style-Type" CONTENT="text/css">
	<meta http-equiv="Content-Script-Type" CONTENT="text/javascript">
	<meta name="keywords" content="erreeme, tapetes, tapeçarias, rugs, custom rugs">
	<meta name="robots" content="all">
	<link rel="shortcut icon" href="img/logos/erreeme.ico" type="image/x-icon">
	<!-- IMPORT STYLESHEETS																 -->
	<!-- media="all,print,handheld"                                                      -->
	<link rel="stylesheet" type="text/css" media="all" href="erreeme.css">
	<!-- IMPORT JAVASCRIPT																 -->
	<script type="text/javascript" src="utils.js"></script>
</head>
<body>
	<?php
		$headers = array();
		$message = array();
		
		$to = $_POST["email"];
		$subject = "Confirmação de Registo da Newsletter de RM Custom Rugs";
		
		$message[] = "\n";
		$message[] = "Obrigado pela sua inscrição.";
		$message[] = "\n";
		$message[] = "O endereço " . $_POST["email"] . " foi registado com sucesso.";

		$headers[] = "MIME-Version: 1.0";
		$headers[] = "Content-type: text/plain; charset=utf-8";
		$headers[] = "Content-Transfer-Encoding: 8bit";
		$headers[] = "From: Newsletter ERREEME <geral@erreeme.pt>";
		$headers[] = "Bcc: <geral@erreeme.pt>,<paulo.romualdo@dualboot.pt>";
		$headers[] = "Reply-To: Newsletter ERREEME <geral@erreeme.pt>";
		$headers[] = "Subject: {$subject}";
		$headers[] = "X-Mailer: PHP/".phpversion();		
		
		// Headers adicionais obrigatóriamente separados por \r\n
		mail($to,$subject,implode("\n",$message),implode("\r\n",$headers));
	?>
	<div class="confirmacao">
		<?php
			$url = "\"erreeme.contactos.php?lang=".$_GET["lang"];
			echo "Obrigado pela Inscri&ccedil&atildeao. Ir&aacute receber a confirma&ccedil&atildeo no seu e-mail.";
			echo "\n<p>".$_POST["email"];
			echo "\n<p><a href=".$url."\">regressar</a>";
			echo "\n</div>";
			echo "<script type=\"text/javascript\">";
			echo "setTimeout('location.href=".$url."\"',6000);";
			echo "</script>";
		?>	
</body>
</html>