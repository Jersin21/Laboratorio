<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
			<div class="card shadow mb-4" id="not1" style="display: block;">
				<!-- Card Header - Dropdown -->
				<div class="card-header">
					<h6 class="m-0 font-weight-bold text-primary">Reportes</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<form action="<?php echo site_url('GetReporte'); ?>" method="post">
					  <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="clinica">Seleccionar Clínica:</label>
					      <select name="clinica" id="clinica" class="form-control">
					        <option value="0">Todos...</option>
					        <?php foreach ($clinicas as $clinica) : ?>
				                <option value="<?php echo $clinica['id']; ?>"><?php echo $clinica['name']; ?></option>
				            <?php endforeach; ?>
					      </select>
					    </div>
					    <div class="form-group col-md-4">
					      <label for="analisis">Seleccionar Categoria:</label>
					      <select name="analisis" id="analisis" class="form-control">
					        <option value="0">Todos...</option>
					        <?php foreach ($categoria as $item) : ?>
				                <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
				            <?php endforeach; ?>
					      </select>
					    </div>
					  </div>
					  <button type="submit" class="btn btn-primary">Generar Reporte</button>
					</form>
				</div>
			</div>
		</div>
	</main>
</div>