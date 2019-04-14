<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title>Radio</title>
	<link href="<?php echo base_url(); ?>css/login.css" rel="stylesheet" type="text/css">
</head>
<body class="body">
	<div class="main">
		<a href="<?php echo base_url(); ?>index.php/Account/view/new">
			<input type="button" name="" value="No tengo una cuenta" class="signInButton font roundBorder">
		</a>
		<?php echo form_open('Login/login', array('id' => 'login')); ?>
			<label class="center block font title">LOGIN</label>
			<input type="text" name="user" placeholder="Usuario" class="block font textField roundBorder" />
			<input type="password" name="password" placeholder="Contraseña" class="block font textField roundBorder" />
			<input type="submit" name="" value="Ingresar" class="block font submit roundBorder" />
		</form>
		<label class="center block font errorTitle"><?php echo $message;?></label>
	</div>
</body>
</html>