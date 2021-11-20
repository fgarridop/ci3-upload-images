<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

	<div class="container mt-5">
		<div class="row">
			<div class="col-md-6 mx-auto">
				<div class="card">
					<div class="card-header text-center">
						<h3>Ejemplo de subida de imágenes</h3>
					</div>
					<div class="card-body">
						<?= form_open_multipart(base_url(), array('id' => 'frmLoadImages'));  ?>
						<div class="form-group">
							<label>Imagen 1</label>
							<input type="file" name="file[]" id="img1" class="form-control">
						</div>

						<div class="form-group mt-4">
							<label>Imagen 2 </label>
							<input type="file" name="file[]" id="img2" class="form-control">
						</div>

						<div class="form-group mt-4">
							<label>Imagen 3</label>
							<input type="file" name="file[]" id="img3" class="form-control">
						</div>

						<div class="form-group mt-4">
							<label>Imagen 4 ( multiples archivos )</label>
							<input type="file" name="file[]" id="img4" class="form-control" multiple>
						</div>

						<div class="form-group text-center mt-4">
							<button type="button" id="btnSubmitButton" class="btn btn-outline-primary">Enviar</button>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>




	<!-- js -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<script src="/assets/js/custom.js?v=<?= rand(99, 99999) ?>"></script>
</body>

</html>