<div class="container">
	<br><br>
	<br><br>
	<div class="row">
		<div class="hidden-xs hidden-sm col-md-2 col-lg-3"></div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
				<form class="form-horizontal" method="post" action="<?php echo base_url('log/data'); ?>">
				  <fieldset >
				    <legend class="text-center">Ingrese sus datos</legend>
				    <div class="form-group">
				      <label for="username" class="col-lg-2 control-label">Usuario</label>
				      <div class="col-lg-10">
				        <input type="text" class="form-control" id="username" name="username" required>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="password" class="col-lg-2 control-label">Contraseña</label>
				      <div class="col-lg-10">
				        <input type="password" class="form-control" id="password" name="password" required>
				      </div>
				    </div>
				    <?php if(isset($error)){ ?>
				    <div class="text-center error">
				    	<strong class="text-center text-danger"><?php echo $mensaje_error; ?></strong>
				    	<br><br>
				    </div>
				    <?php } ?>
				    <div class="form-group">
				      <div class="text-center">
				        <button type="reset" id="limpiar" class="btn btn-default">Limpiar</button>
				        <button type="submit" id="ingresar" class="btn btn-primary">Ingresar</button>
				      </div>
				    </div>
				  </fieldset>
				</form>
		</div>
		<div class="hidden-xs col-sm-12 col-md-2 col-lg-3"></div>
		
	</div>
</div>

<script>
	jQuery(document).ready(function($) {
		$("#username").focus();
		$('#limpiar').unbind().click(function(event) {
			$("#username").focus();
			$('input').val('');
			$('.error').remove();
			
		});

		
	});
</script>