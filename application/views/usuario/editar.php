<style>
	#editar{
		margin-bottom: 15px;
	}
	legend{
		margin-bottom: 5px;
	}
</style>
<?php 
	$username = $this->session->userdata('username');
	$usuario = $this->usuarioModel->getByName($username);
	$empresa = $this->empresaModel->getName($usuario->empresa); 
?>
<div class="container">
	<div class="hidden-xs hidden-sm col-md-1 col-lg-2"></div>
	<div class="col-xs-12 col-sm-12 col-md-10 col-lg-8">
		<div class="form-horizontal">
		  <fieldset>
		    <legend class="text-center">Configuración de la cuenta</legend>
		    <div class="text-right"><a id="editar" href="#" class="btn btn-success btn-xs">Editar</a></div>
		    <div class="form-group">
		      <label for="usuario" class="col-lg-2 control-label">Usuario</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control" id="usuario" placeholder="Nombre de Usuario" value='<?php echo $usuario->nombre; ?>'>
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="inputPassword" class="col-lg-2 control-label">Contraseña</label>
		      <div class="col-lg-10">
		        <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña" value="******">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="empresa" class="col-lg-2 control-label">Empresa</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control" id="empresa" placeholder="Empresa" value="<?php echo $empresa; ?>">
		      </div>
		    </div>
		    <div class="form-group">
		      <div id="button-group" class="text-center hide">
		        <a id="cancelar" class="btn btn-default">Cancelar</a>
		        <a id="guardar" class="btn btn-primary">Guardar</a>
		      </div>
		    </div>
		  </fieldset>
		</div>
	</div>
	<div class="hidden-xs hidden-sm col-md-1 col-lg-2"></div>
</div>

<script>
	jQuery(document).ready(function($) {
		$('input,textarea').attr('readonly', true);
		$('#editar').unbind().click(function(event) { editable(true); });
		$('#guardar').unbind().click(function(event) { editable(false);save(); });
		$('#cancelar').unbind().click(function(event) { reload();});

		function editable(value){
			if(value){
				$('#editar').addClass('hide');
				$('input,textarea').attr('readonly', false);
				$('#usuario').focus();
				$('#button-group').removeClass('hide');
			}else{
				$('#editar').removeClass('hide');
				$('input,textarea').attr('readonly', true);
				$('#button-group').addClass('hide');
			}
		}

		function save(){
			console.log('salvado!');
		}

		function reload(){
			location.reload();
		}
	});
</script>


