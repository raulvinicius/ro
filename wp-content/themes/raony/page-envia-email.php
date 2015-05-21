<?php

	$nome = $_POST['nm'];
	$nick = explode( " ", $nome, 2 );
	$nick = $nick[0];
	$assunto = $_POST['ssnt'];
	$email = $_POST['ml'];
	$telefone = $_POST['tlfn'];
	$mensagem = $_POST['msgm'];

	$url = get_bloginfo('url');
	$tUrl = get_bloginfo('template_url');

	$nomeEmpresa = "Raony Oliveira Car Detail";
	$emailEmpresa = "contato@raonycardetail.com.br";
	// $emailEmpresa = "raul.portifolio@gmail.com";


	$msgParaAdmin ="
	<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
	<div style='width: 100%; padding: 50px 0;'>
		<table style='background: white; width: 460px; border-radius: 3px 0 3px; margin: 0 auto; border: 20px solid #31a98e; padding: 10px;'>
			<tr style=''>
				<td style='font-family:Arial, sans; height: 110px;'>
					<img src='$tUrl/img/raonyoliveira-logo-cd.png' style='margin: 20px 0; padding: 0 0 20px; border-bottom: 1px solid #ddd'>
				</td>
			</tr>
			<tr>
				<td  style='font-family:Arial, sans;'>
					<h1 style='font-size:20px; margin-bottom: 0; color: #31a98e;'><b>$assunto</b></h1>
					<p style='font-size:14px; margin-top: 0; margin-bottom: 10px; color: #999;'>Essa mensagem foi enviada atrav&eacute;s do site.</p>
					<div style='width: 90%; background: #f5f5f5; padding: 1% 5%; margin-top: 20px; color: #888'>
						<p style='border-bottom: 2px dotted #fff; padding: 10px 0 20px'><b style='color: #31a98e'>Nome: </b>$nome</p>
						<p style='border-bottom: 2px dotted #fff; padding: 10px 0 20px'><b style='color: #31a98e'>E-mail: </b>$email</p>
						<p style='border-bottom: 2px dotted #fff; padding: 10px 0 20px'><b style='color: #31a98e'>Telefone: </b>$telefone</p>
						<p style='padding: 10px 0 20px'><b style='color: #31a98e'>Mensagem: </b>$mensagem</p>
					</div>
				</td>
			</tr>
		</table>
	</div>
	";


	$msgParaUsuario  = "
	<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
	<div style='width: 100%; padding: 50px 0;'>
		<table style='background: white; width: 460px; border-radius: 3px 0 3px; margin: 0 auto; border: 20px solid #31a98e; padding: 10px;'>
			<tr style=''>
				<td style='font-family:Arial, sans; height: 110px;'>
					<img src='$tUrl/img/raonyoliveira-logo-cd.png' style='margin: 20px 0; padding: 0 0 20px; border-bottom: 1px solid #ddd'>
				</td>
			</tr>
			<tr>
				<td  style='font-family:Arial, sans;'>
					<h1 style='font-size:20px; margin-bottom: 0; color: #31a98e;'><b>Confirma&ccedil;&atilde;o de contato</b></h1>
					<p style='font-size:14px; margin-bottom: 10px; color: #666; line-height: 24px'><strong>Oi <b>$nick</b>!</strong><br/>
						Ficamos felizes pelo seu contato.<br><br>
						J&aacute; recebemos seu e-mail e responderemos o mais breve poss&iacute;vel. Grande abra&ccedil;o!<br>
					</p>
					<p style='margin-top: 30px; font-style: italic; color:#999; font-size:10px; font-family: Arial'>Observa&ccedil;&atilde;o: N&atilde;o &eacute; necess&aacute;rio responder este e-mail.<br><br></p>

				</td>
			</tr>
		</table>
	</div>
	";

	$headerParaUsuario = "MIME-Version: 1.1\r\n";
	$headerParaUsuario .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headerParaUsuario .= "From: $nomeEmpresa <$emailEmpresa>\r\n"; // remetente
	$headerParaUsuario .= "Return-Path: $emailEmpresa\r\n"; // return-path
	
	$headerParaEmpresa = "MIME-Version: 1.0\r\n";
	$headerParaEmpresa .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headerParaEmpresa .="From: $nome <$email>\n";
	$headerParaEmpresa .= "Return-Path: $emailEmpresa\r\n"; // return-path


	// if($_SERVER['HTTP_HOST'] != "localhost")
	// {
		mail($emailEmpresa,utf8_decode("Contato feito pelo site"),utf8_decode($msgParaAdmin),$headerParaEmpresa, '-f'.$emailEmpresa) or die("erro");
		mail($email,utf8_decode("Confirmação de Contato"),utf8_decode($msgParaUsuario),$headerParaUsuario, '-f'.$emailEmpresa) or die("erro");
	// }

	echo "sucesso";