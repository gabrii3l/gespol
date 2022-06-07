<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="<?php echo base_url("assets/css/login2.css"); ?>" rel="stylesheet" type="text/css" />
<html>
<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
?>
<head>
	<title>Gespol</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3 class="titulologin">Gestión de Procedimientos </h3>
				</div>
				<div class="card-body">
					<?php echo validation_errors(); ?>
					<form action="<?php echo base_url('inicio/login'); ?>" enctype="multipart / form-data" method="post">

						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="txtrut" value="<?php echo set_value('txtrut'); ?>" onkeyup="this.value = soloNumeros(this.value)" class="form-control" placeholder="Rut">

						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="txtpass" class="form-control" placeholder="password" required>
						</div>

						<div class="form-group">
							<input type="submit" value="Ingresar" class="btn float-right login_btn">
						</div>
					</form>
				</div>
				<div class="card-footer">

				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function soloNumeros(string) {
			var out = '';
			var filtro = '1234567890kK-'; 
			for (var i = 0; i < string.length; i++)
				if (filtro.indexOf(string.charAt(i)) != -1)
					out += string.charAt(i);
			return out;
		}
	</script>
	<script type="text/javascript">
		function Numeros(e) {
			var key = window.Event ? e.which : e.keyCode
			return (key >= 48 && key <= 57);
		}
	</script>
</body>

</html>