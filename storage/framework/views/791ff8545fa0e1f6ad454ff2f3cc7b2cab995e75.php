<?php $__env->startSection('title', 'Curador de Recetas'); ?>

<?php $__env->startSection('main'); ?>

	<section class="container">
		<form action="<?php echo e($receta->id); ?>" class="formCurador" method="post" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>

            <?php echo method_field('PUT'); ?>
			<div class="form-group">
				<div class="form-group">
					<label for="">Título de la receta</label>
					<input class="form-control titulo" type="text" name="titulo" value="<?php echo e($receta->titulo); ?>">
					<?php echo $errors->first('titulo', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>'); ?>

					<div class="invalid-feedback"></div>
				</div>

				<?php if("<?php echo e(asset('$receta->imagen')); ?>"): ?>
			        <img src="<?php echo e(asset($receta->imagen)); ?>" width="200px" alt=""><br>
			    <?php else: ?>
			            <p>No se cargó ninguna imagen</p>
			    <?php endif; ?> <br>	

				<div class="form-group custom-file">
					<label for="" class="custom-file-label image">Seleccioná la imagen que se verá en la receta</label>
					<input class="custom-file-input image-input" type="file" lang="es" name="imagen">
					<?php echo $errors->first('imagen', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>'); ?>

					<div class="invalid-feedback"></div>
				</div><br><br>

				<div class="form-group">
					<label for="">La receta se prepara para:</label><br>
					<?php $__currentLoopData = $momentosComidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $momento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php
							$momentoComidaId = $receta->momentocomidas->pluck('id')->toArray();
							$checked = (in_array($momento->id, $momentoComidaId)) ? 'checked' : ''
						?>
						<label class="form-check-label" for="<?php echo e($momento->getId()); ?>"><?php echo e($momento->getNombre()); ?></label>
						<input <?php echo e($checked); ?> type="checkbox" id="<?php echo e($momento->getId()); ?>" name="momentocomida_id[]" value="<?php echo e($momento->getId()); ?>">
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php echo $errors->first('momentocomida_id.*', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>'); ?>

					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Tiempo de preparación: (en minutos)</label>
					<input class="form-control" type="text" name="timpoPreparacion" value="<?php echo e($receta->timpoPreparacion); ?>">
					<?php echo $errors->first('timpoPreparacion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>'); ?>

					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Tiempo de cocción: (en minutos)</label>
					<input class="form-control" type="text" name="timpoCoccion" value="<?php echo e($receta->timpoCoccion); ?>">
					<?php echo $errors->first('timpoCoccion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>'); ?>

					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Esta listo en: (en minutos)</label>
					<input class="form-control" type="text" name="listaEn" value="<?php echo e($receta->listaEn); ?>">
					<?php echo $errors->first('listaEn', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>'); ?>

					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Nivel de dificultad:</label>
					<select class="form-control" name="dificultad_id">
						<option value="">Nivel</option>
						<?php $__currentLoopData = $tipoDificultad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dificultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
								$selected = ($dificultad->id == $receta->dificultad_id) ? 'selected' : '';
							?>
							<option value="<?php echo e($dificultad->getId()); ?>" <?php echo e($selected); ?> ><?php echo e($dificultad->getNombre()); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<?php echo $errors->first('dificultad_id', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>'); ?>

					<div class="invalid-feedback"></div>
				</div>

				<?php if("<?php echo e(asset('$receta->portada')); ?>"): ?>
			        <img src="<?php echo e(asset($receta->portada)); ?>" width="200px" alt=""><br>
			    <?php else: ?>
			            <p>No se cargó ninguna portada</p>
			    <?php endif; ?> <br>	

				<div class="form-group custom-file">
					<label for="" class="custom-file-label cover">Seleccioná la imagen que se verá en el home</label>
					<input class="custom-file-input cover-input" type="file" lang="es" name="portada">
				<?php echo $errors->first('portada', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>'); ?>

					<div class="invalid-feedback"></div>
				</div><br><br>

				<div class="form-group">
					<label for="">Breve descripcion de la comida/receta</label>
					<textarea class="form-control" name="breveDescripcion" value=""><?php echo e($receta->breveDescripcion); ?></textarea>
					<?php echo $errors->first('breveDescripcion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>'); ?>

					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Descripcion de la comida/receta</label>
					<textarea class="form-control" name="descripcion" value=""><?php echo e($receta->descripcion); ?></textarea>
					<?php echo $errors->first('descripcion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>'); ?>

					<div class="invalid-feedback"></div>
				</div>

				<h3>Ingredientes de la receta</h3>
					<div class="padre">
						<div class="form-group hijo">
							<input class="form-control mb-3 ingredienteYcantidad" placeholder="Cantidad e ingrediente?" type="text" name="ingredienteYcantidad[]" value="">
						</div>
						<?php echo $errors->first('ingrediente', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>'); ?>

					</div>
					<?php $__currentLoopData = $ingredientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingrediente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($receta->id == $ingrediente->recipe_id): ?>
							<?php dump($ingrediente); ?>;
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
					<ul id="ingredientes">
					</ul>

					<button id="anadir" class="btn btn-primary col-6 anadirIngrediente" type="button"> Agregar ingrediente </button><br><br>
        			<button id="borra" class="btn btn-danger col-6 borrarIngrediente" type="button">Borrar ingrediente</button><br><br>

        			<script>
						var nueva_entrada = $('.padre').html();

		                $("#anadir").click(function(){
		                    $(".padre").append(nueva_entrada);
		                });

		                $("#borra").click(function(){
		                	$('.hijo').last().remove();
		                });

		                var btnAnadirIngrediente = document.querySelector('.anadirIngrediente');
		                var clicks = 0;

		                btnAnadirIngrediente.addEventListener('click', function(event){
		                	var hijo = document.querySelectorAll('.hijo');

					 		hijo[clicks].style.display = "";

					 		clicks += 1;

					 		//esto es para poder guardar y que validen los datos
					 		var ingredienteYcantidad = document.querySelector('.ingredienteYcantidad');

		                	ingredienteYcantidad.classList.remove('ingredienteYcantidad')

							ingredienteYcantidad.classList.add('ingredienteYcantidad'+clicks)

							var ingredienteYcantidadN = document.querySelector('.ingredienteYcantidad'+clicks);
							
							ingredienteYcantidadN.setAttribute('name', 'ingredienteYcantidad[]')
		                });  

		                <?php $__currentLoopData = $ingredientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingrediente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							if (<?php echo e($receta->id); ?> == <?php echo e($ingrediente->recipe_id); ?>) {
								var lista = document.querySelector('#ingredientes');
								var ingrediente = '<?php echo e($ingrediente->ingredienteYcantidad); ?>';
								// arrayIngredientes.push() = '$ingrediente->ingrediente';
								// ingredientes.append(ingrediente);
								var node = document.createElement('LI');
								var textNode = document.createTextNode(ingrediente);
								node.appendChild(textNode);
								lista.appendChild(node);
							}
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</script>

				<h3>Instrucciones para esta receta</h3>
					<div class="padre2">
						<div class="hijo2">
							<div class="form-group">
								<label class="form-control-label" for="">Instrucción</label>
								<input class="form-control mb-3 numeroInstruccion" placeholder="Numero?" type="text" name="numeroInstruccion[]">
							</div>
							<?php echo $errors->first('numeroInstruccion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>'); ?>

							
							<div class="form-group instruccion">
								<input class="form-control instruccion" placeholder="Instrucción" type="text" name="instruccion[]">
							</div>
							<?php echo $errors->first('instruccion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>'); ?>

						</div>
					</div>

					<ul id="instrucciones">
					</ul>

					<button id="anadir2" class="btn btn-primary col-6 anadirInstruccion" type="button"> Agregar Instrucción </button><br><br>
        			<button id="borra2" class="btn btn-danger col-6 borrarInstruccion" type="button">Borrar Instrucción</button><br><br>

        			<script>
						var nueva_entrada2 = $('.padre2').html();

		                $("#anadir2").click(function(){
		                    $(".padre2").append(nueva_entrada2);
		                });

		                $("#borra2").click(function(){
		                	$('.hijo2').first().remove();
			                alert('Se borró una instrucción');
		                });

		                var btnAnadirInstruccion = document.querySelector('.anadirInstruccion');
		                var clicks2 = 0;

		                btnAnadirInstruccion.addEventListener('click', function(event){
		                	var hijo2 = document.querySelectorAll('.hijo2');
							console.log(hijo2);
							console.log(clicks2);

					 		hijo2[clicks2].style.display = "";

					 		clicks2 += 1;

					 		//esto es para poder guardar y que validen los datos
					 		var numeroInstruccion = document.querySelector('.numeroInstruccion');

		                	numeroInstruccion.classList.remove('numeroInstruccion')

							numeroInstruccion.classList.add('numeroInstruccion'+clicks2)

							var numeroInstruccionN = document.querySelector('.numeroInstruccion'+clicks2);
							
							numeroInstruccionN.setAttribute('name', 'numeroInstruccion[]')

							var instruccion = document.querySelector('.instruccion');

		                	instruccion.classList.remove('instruccion')

							instruccion.classList.add('instruccion'+clicks2)

							var instruccionN = document.querySelector('.instruccion'+clicks2);
							
							instruccionN.setAttribute('name', 'instruccion[]')
		                }); 

		                <?php $__currentLoopData = $instrucciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instruccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							if (<?php echo e($receta->id); ?> == <?php echo e($instruccion->recipe_id); ?>) {
								var lista = document.querySelector('#instrucciones');
								var numeroInstruccion = '<?php echo e($instruccion->numeroInstruccion); ?>';
								var instruccion = '<?php echo e($instruccion->instruccion); ?>';
								// arrayIngredientes.push() = '$ingrediente->ingrediente';
								// ingredientes.append(ingrediente);
								var node = document.createElement('LI');
								var textNode = document.createTextNode(numeroInstruccion+') '+instruccion);
								node.appendChild(textNode);
								lista.appendChild(node);
							}
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</script>
			</div>

			<button type="submit" class="btn btn-success col-xl enviar">Enviar</button><br><br>
		</form>
	</section>

	<script src="/js/curador.js" type="text/javascript" charset="utf-8" async defer></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>