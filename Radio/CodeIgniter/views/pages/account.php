<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title><?php echo ($new ? 'Nueva' : 'Actualizar') . ' cuenta';?></title>
	<link href="<?php echo base_url(); ?>css/account.css" rel="stylesheet" type="text/css">
</head>
<body class="body">
	<label class="block font title"><?php echo ($new ? 'Crea una' : 'Actualiza tu') . ' cuenta';?></label>
	<?php echo form_open('Account/' . ($new ? 'store' : 'update'), array('id' => $new ? 'store' : 'update')); ?>
		<input type="text" name="name" placeholder="Nombre completo" class="textField block roundBorder font" value="<?php echo $account['name'];?>">
		<input type="email" name="email" placeholder="Correo electrónico" class="textField block roundBorder font" value="<?php echo $account['email'];?>">
		<input type="text" name="phone" placeholder="Teléfono celular" class="textField block roundBorder font" value="<?php echo $account['phone'];?>">
		<input type="text" name="user" placeholder="Nombre de usuario" class="textField block roundBorder font" value="<?php echo $account['user'];?>">
		<input type="password" name="password" placeholder="Contraseña" class="textField block roundBorder font" value="<?php echo $account['password'];?>">
		<input type="password" name="confirmation" placeholder="Confirma tu contraseña" class="textField block roundBorder font" value="<?php echo $account['password'];?>">
		<div class="footer">
			<a href="<?php echo base_url(); ?>index.php/Login/view/login">
				<input type="button" name="" value="Cancelar" class="button cancel roundBorder font">
			</a>
			<input type="submit" name="" value="<?php echo $new ? 'Registrar' : 'Guardar';?>" class="button submit roundBorder font">
		</div>
	</form>
	<label class="block font errorTitle"><?php echo $message;?></label>
</body>
</html>