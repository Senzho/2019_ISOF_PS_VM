<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title>Inicio</title>
	<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/quiz.js"></script>
</head>
<body class="body">
	<div class="menu">
		<label class="font title"><?php echo $name;?></label>
		<a href="<?php echo base_url(); ?>index.php/Account/view/update">
			<input type="button" name="" value="Perfil" class="font menuItem menuItemOption">
		</a>
		<input type="button" name="" value="Música" class="font menuItem menuItemOption">
		<input type="button" name="" value="Programas" class="font menuItem menuItemOption">
		<a href="<?php echo base_url(); ?>index.php/Login/log_out">
			<input type="button" name="" value="Salir" class="font menuItem menuItemLogOut">
		</a>
	</div>
	<div id="songsPane"></div>
</body>
</html>