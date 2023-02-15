<?php $i = 1; ?>
<div class="container">
	<div class="row">
		<div class="col g-5 ">
			<!-- Botão Adicionar Imagem-->
			<button type="button" class="btn btn-outline-danger rounded-pill" data-bs-toggle="modal"
				data-bs-target="#modal_add">
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
					class="bi bi-cloud-plus-fill" viewBox="0 0 16 16">
					<path
						d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm.5 4v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z" />
				</svg> Carregar Imagem
			</button>
			<!-- Modal -->
			<div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">
								<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
									class="bi bi-card-image" viewBox="0 0 16 16">
									<path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
									<path
										d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z" />
								</svg>
								Adicionar Imagem
							</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<?php echo form_open_multipart('home/carregar'); ?>
						<div class="modal-body">
							<div class="container-fluid">
								<div class="mb-3">
									<label for="formFile" class="form-label">Escolha uma imagem</label>
									<input class="form-control" name="imagem" type="file" id="formFile" required>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary rounded-pill"
								data-bs-dismiss="modal">Cancelar</button>
							<button id='btn_add' type="" class="btn btn-outline-danger rounded-pill">Adicionar</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col g-5 mt-3 mb-3">
			<h4 class='mt-2 mb-2'>
				<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-images"
					viewBox="0 0 16 16">
					<path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
					<path
						d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
				</svg>
				Galeria
			</h4>
			<div class="card overflow-auto shadow-lg" style='height:20rem'>

				<div class="card-body ">
					<div class="row row-cols-1 row-cols-md-3 g-4">
						<?php foreach ($dados as $d) { ?>
							<div class="col">

								<div class="card border border-0 " style="width: 18rem;">
									<div class="card-body">
										<blockquote class="blockquote mb-0">
											<picture>
												<!-- Botão remover -->
												<div class="position-relative">
													<div class="position-absolute top-0 start-100 translate-middle">
														<button id='btn_remove<?php echo $i; ?>' onclick='get_id	(this.id)'
															type="button" class="btn btn-outline-dark	rounded-circle"
															data-bs-toggle="modal" data-bs-target="#modal_remove"
															style='margin-bottom:-0.5rem;' value='<?php echo $d['id']; ?>'>
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
																fill="currentColor" class="bi bi-trash-fill"
																viewBox="0 0 16 16">
																<path
																	d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
															</svg>
														</button>
													</div>

												</div>

												<img src="<?php echo $d['caminho']; ?>"
													class="img-fluid mt-3 mb-3 rounded shadow-lg" alt="..."
													style="width:15rem;height:15rem;">
											</picture>
										</blockquote>
									</div>
								</div>


							</div>
							<?php $i++;
						} ?>


					</div>
				</div>
			</div>

		</div>
	</div>

	<!-- Modal Remover-->
	<div class="modal fade" id="modal_remove" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<input type='hidden' id='id'>
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Deletar essa imagem ?</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Deseja Deletar a Imagem ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary rounded-pill"
						data-bs-dismiss="modal">Cancelar</button>
					<button id='btn_remover' type="button" class="btn btn-outline-danger rounded-pill">Deletar
						Imagem</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal" id='modal_continue' tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Imagem deletada com sucesso!</h5>
				</div>
				<div class="modal-body">
					<p>Imagem deletada com sucesso!</p>
				</div>
				<div class="modal-footer">

					<button id='btn_continue' type="button"
						class="btn btn-outline-success rounded-pill">Continuar</button>
				</div>
			</div>
		</div>
	</div>
</div>



<script>
	$('#modal_continue').hide();

	function get_id(p) {
		return $('#id').val($('#' + p).val())
	}

	$('#btn_remover').click(() => {
		console.log($('#id').val());
		$.ajax({
			url: 'http://localhost/galeria/index.php/home/deletar_imagem',
			method: 'POST',
			data: { id: $('#id').val() },
			success: function (r) {
				$('#modal_continue').show();
				$('#btn_continue').click(() => {
					window.location.href = window.location.href
				})
				console.log(r)
			}
		})
	})



</script>