<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title>Inicio</title>
	<link href="<?php echo base_url(); ?>css/index.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/index.js"></script>
</head>
<body class="body">
	<div class="menu">
		<label class="font title">Radio MAX</label>
		<a href="<?php echo base_url(); ?>index.php/Login/view/login">
			<input type="button" name="" value="Inicia sesión" class="font menuItem menuItemOption">
		</a>
	</div>
	<div id="content">
		<div class="quiz roundBorder">
			<div class="quizTitleBlock">
				<label class="font quizTitle">¿Nos ayudas puntuando 3 canciones?</label>
			</div>
			<form id="quizForm">
				<div id="quizSongs" class="songsPane"></div>
				<input type="submit" name="" value="Enviar" class="buttonFooter button roundBorder ok"/>
			</form>
		</div>
	</div>
</body>
</html>