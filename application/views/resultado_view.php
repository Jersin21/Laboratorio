<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
<div class="card shadow mb-4" id="not1" style="display: block;">
	<!-- Card Header - Dropdown -->
	<div class="card-header">
		<h6 class="m-0 font-weight-bold text-primary">Lista de Solicitudes</h6>
	</div>
	<!-- Card Body -->
	<div class="card-body">
	<table id="tblList"class="table">
		<thead>	
			<tr>
				<th>Paciente</th>
				<th>Fecha</th>
				<th>Muestra</th>
				<th>Estado</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody id="tblComList">
		</tbody>
	</table>
	</div>
</div>
<div class="col-xl-12" id="not2" style="display: none;" >
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header d-flex flex-row align-items-center justify-content-between" style="padding-top: 5px; padding-bottom: 5px">
            <h6 class="m-0 font-weight-bold text-primary">Solicitud</h6>
            <div class="dropdown no-arrow">      					
			    <button type="button" class="btn btn-info" title="Agregar" id="btnCancelarver">Atras</button>
        	</div>
	    </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="container-90">
				<div class="row">
					<div class="col-md-4 col-xs-12">	
						<div class="ui-widget ui-front">
							<label for="txtClient">Paciente:<span class="campoObligatorio">*</span></label>
							<input id="paciente" class="form-control"  />
						</div>
					</div>
					<div class="col-md-3">	
							<label for="inicio">Fecha: <span class="campoObligatorio">*</span></label>
							<input class="form-control" type="date" id="fecha" name="inicio" value="<?php echo date('Y-m-d'); ?>"/>
					</div>
					<div class="col-md-5 col-xs-12">	
						<label for="estado">Responsable de la toma de Muestra:<span class="campoObligatorio">*</span></label>
						<select class="form-control" name="estado" id="muestra">
							<option value="Clinica">Clinica</option>
							<option value="Laboratorio">Laboratorio</option>
						</select> 
					</div>
					<div class="col-md-12">							
							<label for="direccion">Observaciones <span class="campoObligatorio">*</span></label>
							<input class="form-control" type="text" id="observaciones" name="direccion" />			
					</div>					
				</div>
				<br>
				<div class="row" style="margin-top: 6px">
					<div class="col-md-4 col-xs-12">
						<h6>BIOMETRÍA HEMATICA</h6>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="1">
						  <label class="form-check-label" for="1">
						    Hemoglobina
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id=2>
						  <label class="form-check-label" for="1">
						    Hematocrito
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="3">
						  <label class="form-check-label" for="1">
						    Hematíes
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="4">
						  <label class="form-check-label" for="1">
						    Leucocitos
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="5">
						  <label class="form-check-label" for="1">
						    Fórmula Diferencial
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="6">
						  <label class="form-check-label" for="1">
						    Eritrosedimentación
						  </label>
						</div>
						<br>
						<h6>HEMOSTASICOS</h6>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="7">
						  <label class="form-check-label" for="1">
						    T. Sangría 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="8">
						  <label class="form-check-label" for="1">
						    T. Coagulacíon 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="9">
						  <label class="form-check-label" for="1">
						    T. Protrombina 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="10">
						  <label class="form-check-label" for="1">
						    TPT 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="11">
						  <label class="form-check-label" for="1">
						    Fibrinógeno 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="12">
						  <label class="form-check-label" for="1">
						    Plaquetas 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="13">
						  <label class="form-check-label" for="1">
						    Grupo Sanguineo 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="14">
						  <label class="form-check-label" for="1">
						    Factor Rh 
						  </label>
						</div>
						<br>
						<h6>ELECTROLITOS</h6>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="15">
						  <label class="form-check-label" for="1">
						    Sodio Na 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="16">
						  <label class="form-check-label" for="1">
						    Potacio K 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="17">
						  <label class="form-check-label" for="1">
						    Cloro Cl 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="18">
						  <label class="form-check-label" for="1">
						    Calcio Ca 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="19">
						  <label class="form-check-label" for="1">
						    Fósforo 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="20">
						  <label class="form-check-label" for="1">
						    Magnesio 
						  </label>
						</div>
						<br>
						<h6>BACTEREOLÓGICOS</h6>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="21">
						  <label class="form-check-label" for="1">
						    Recuento de Baterias por campo 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="22">
						  <label class="form-check-label" for="1">
						    Tricomonas 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="23">
						  <label class="form-check-label" for="1">
						    Gram 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="24">
						  <label class="form-check-label" for="1">
						    Zlelh Neelsen
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="25">
						  <label class="form-check-label" for="1">
						    Cultivo e identificación 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="26">
						  <label class="form-check-label" for="1">
						    Cultivo en Nickerson 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="27">
						  <label class="form-check-label" for="1">
						    Prueba de Sensibilidad a los Antibióticos 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="28">
						  <label class="form-check-label" for="1">
						    Autovacunas 
						  </label>
						</div>
					</div>
					<div class="col-md-4 col-xs-12">
						<h6>BIOQUÍMICA</h6>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="29">
						  <label class="form-check-label" for="1">
						    Úrea 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="30">
						  <label class="form-check-label" for="1">
						    Creatinina 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="31">
						  <label class="form-check-label" for="1">
						    Ácido Úrico 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="32">
						  <label class="form-check-label" for="1">
						    Glucosa 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="33">
						  <label class="form-check-label" for="1">
						    Glucosa Postprandial 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="34">
						  <label class="form-check-label" for="1">
						    Colesterol 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="35">
						  <label class="form-check-label" for="1">
						    HDL-Colesterol 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="36">
						  <label class="form-check-label" for="1">
						    LDL-Colesterol 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="37">
						  <label class="form-check-label" for="1">
						    Triglicéridos 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="38">
						  <label class="form-check-label" for="1">
						    Lídos Totales 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="39">
						  <label class="form-check-label" for="1">
						    Proteínas y fracciones 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="4">
						  <label class="form-check-label" for="1">
						    Bilirrubina y fracciones 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="41">
						  <label class="form-check-label" for="1">
						    Hierro Sérico 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="42">
						  <label class="form-check-label" for="1">
						    Fijacion del Hierro 
						  </label>
						</div>
						<br>
						<h6>ESPECIALES</h6>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="43">
						  <label class="form-check-label" for="1">
						    T3
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="44">
						  <label class="form-check-label" for="1">
						    T4 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="45">
						  <label class="form-check-label" for="1">
						    Citomegalovirus 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="46">
						  <label class="form-check-label" for="1">
						    PSA
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="47">
						  <label class="form-check-label" for="1">
						    Rubéola 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="48">
						  <label class="form-check-label" for="1">
						    Herpes I-II 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="49">
						  <label class="form-check-label" for="1">
						    Anticuerpo
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="50">
						  <label class="form-check-label" for="1">
						    HIV
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="51">
						  <label class="form-check-label" for="1">
						    Hepatitis 
						  </label>
						</div>
					</div>
					<div class="col-md-4 col-xs-12">
						<h6>ENZIMAS</h6>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="52">
						  <label class="form-check-label" for="1">
						    Fosfatasa Alcalina 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="53">
						  <label class="form-check-label" for="1">
						    Gama G.T.
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="54">
						  <label class="form-check-label" for="1">
						    Fosfatasa Ácida Total
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="55">
						  <label class="form-check-label" for="1">
						    Fosfatasa Ácida Prostatica
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="56">
						  <label class="form-check-label" for="1">
						    G.O.T. y G.P.T.
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="57">
						  <label class="form-check-label" for="1">
						    LDH 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="58">
						  <label class="form-check-label" for="1">
						    CK 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="59">
						  <label class="form-check-label" for="1">
						    CKMB 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="60">
						  <label class="form-check-label" for="1">
						    Lipasa 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="61">
						  <label class="form-check-label" for="1">
						    Amilasa 
						  </label>
						</div>
						<br>
						<h6>SEROLÓGICOS</h6>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="62">
						  <label class="form-check-label" for="1">
						    VDRL 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="63">
						  <label class="form-check-label" for="1">
						    Widal y Well Felix 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="64">
						  <label class="form-check-label" for="1">
						    Toxoplasma 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="65">
						  <label class="form-check-label" for="1">
						    ASTO 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="66">
						  <label class="form-check-label" for="1">
						    R.A. Test 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="67">
						  <label class="form-check-label" for="1">
						    PCR 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="68">
						  <label class="form-check-label" for="1">
						    Mono test 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="69">
						  <label class="form-check-label" for="1">
						    LE test 
						  </label>
						</div>
						<br>
						<h6>ORINAS</h6>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="70">
						  <label class="form-check-label" for="1">
						    Físico - Quimico 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="71">
						  <label class="form-check-label" for="1">
						    Sedimento 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="72">
						  <label class="form-check-label" for="1">
						    Gravindex 
						  </label>
						</div>
						<br>
						<h6>HECES</h6>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="73">
						  <label class="form-check-label" for="1">
						    Sustancias Digestivas 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="74">
						  <label class="form-check-label" for="1">
						    Parasitológico 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="75">
						  <label class="form-check-label" for="1">
						    Sangre oculta 
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="76">
						  <label class="form-check-label" for="1">
						    Estudio del Moco Fecal 
						  </label>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12" id="not3" style="display: none;" >
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header d-flex flex-row align-items-center justify-content-between" style="padding-top: 5px; padding-bottom: 5px">
            <h6 class="m-0 font-weight-bold text-primary">Solicitud</h6>
            <div class="dropdown no-arrow">      					
			    <button type="button" class="btn btn-info" title="Agregar" id="btnAddResult">Guardar</button>
			    <button type="button" class="btn btn-info" title="Agregar" id="btnCancelarresult">Cancelar</button>
        	</div>
	    </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="container-90">
				<div class="row">
					<div class="col-md-4 col-xs-12">	
						<div class="ui-widget ui-front">
							<label for="txtClient">Paciente:<span class="campoObligatorio">*</span></label>
							<input id="pacienter" class="form-control"  />
						</div>
					</div>
					<div class="col-md-3">	
							<label for="inicio">Fecha: <span class="campoObligatorio">*</span></label>
							<input class="form-control" type="date" id="fechar" name="inicio" value="<?php echo date('Y-m-d'); ?>"/>
					</div>
					<div class="col-md-5 col-xs-12">	
						<label for="estado">Responsable de la toma de Muestra:<span class="campoObligatorio">*</span></label>
						<select class="form-control" name="estado" id="muestrar">
							<option value="Clinica">Clinica</option>
							<option value="Laboratorio">Laboratorio</option>
						</select> 
					</div>
					<div class="col-md-12">							
							<label for="direccion">Observaciones <span class="campoObligatorio">*</span></label>
							<input class="form-control" type="text" id="observacionesr" name="direccion" />			
					</div>					
				</div>
				<br>
				<div class="row" style="margin-top: 6px">
					<div class="col-md-12 col-xs-12" id ="container">
						
						
					</div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal imagen-->
<div id="modalImagen" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar imagen</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>               
            </div>

            <div class="modal-body">
                <input type="file" id="fileInput" multiple>
				<div id="status"></div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" onclick="uploadImages()">Guardar Imagen</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>

    </div>
</div>
	</div>
	</main>
<!-- Modal advertencia-->
<div id="modaladvertencia" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>               
            </div>

            <div class="modal-body">
                <p id="mensajeadver">¿Esta Seguro de Querer Eliminar esta Solicitud?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="btndeletComp">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>

    </div>
</div>
	</div>
	</main>
</div>
<script src="<?php echo APP_PATH_JS; ?>resultado.js"></script>