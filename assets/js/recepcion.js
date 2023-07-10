var _idnew = 0;
$(function() {
    cargarTabla();
    AutoComplete();
});
//Carga la tabla
function cargarTabla() {
  var funcion = "TraerComp";
  var datas={
    "function": funcion
  };
  $.ajax({
    type: "POST",
    url: app_base_url +"GetSolicitudPendiente",
    data: datas, 
    dataType: "json",
    success: function(data){


    $("#tblComList").html("");
    for(var i=0; i<data.length; i++){ 

    const fechaFormateada = new Date(data[i].fecha).toLocaleDateString('es-ES');
    
    var tr = `<tr id = "`+data[i].id+`">
      <td>`+data[i].clinica+`</td>
      <td>`+data[i].medico+`</td>
      <td>`+data[i].especialidad+`</td>
      <td>`+data[i].paciente+`</td>
      <td>`+fechaFormateada+`</td>
      <td>`+data[i].muestra+`</td>
      <td>
        <a class="boton-op btn-asignar" title="Asignar" style="cursor: hand;cursor:pointer">
          <span class="fa fa-link"></span>
        </a>
        <a class="boton-op btn-editComp" title="Ver" style="cursor: hand;cursor:pointer">
          <span class="fa fa-eye"></span>
        </a>
      </td>
    </tr>`;
    $("#tblComList").append(tr);
    }
    $("#tblList").DataTable();

    },
    error: function(data) {
      alert('error');
    }
  });
}
//Boton cancelar para volver a la tabla
$( "#btnCancelaredit" ).on( "click", function() {
    $('#not2').css('display','none');
    $('#not1').css('display','block'); 
});

function limpiar(){
  $('#paciente').val('');
  $('#fecha').val('');
  $('#muestra').val('');
  $('#observaciones').val('');
  $('#pacienter').val('');
  $('#fechar').val('');
  $('#muestrar').val('');
  $('#observacionesr').val('');

  const checkboxes = document.querySelectorAll('input[type="checkbox"]');

  checkboxes.forEach(checkbox => {
    checkbox.checked = false;
  });
}

//boton editar de la tabla
$(document).on('click','.btn-editComp',function(){
  limpiar();
  var id = $(this).parent().parent().attr("id");
  var estado = $(this).closest('tr').find('td:eq(4)').text();
  
  var datas={
  "id": id
  };
  $.ajax({
    type: "POST",
    url:app_base_url + "GetSolicitudId",
    data: datas, 
    dataType: "json",
    success: function(data){

          var id = data[0].id;
          $("#btnAddComp").attr("data-idcom",id);
          $('#paciente').val(data[0].paciente);
          $('#fecha').val(data[0].fecha);
          $('#muestra').val(data[0].muestra);
          $('#observaciones').val(data[0].observaciones);

          const checkboxes = document.querySelectorAll('input[type="checkbox"]');
          
          checkboxes.forEach(checkbox => {
            const checkboxId = checkbox.id.toString();
            
            if (data[1].some(item => item.idAnalisis === checkboxId)) {
              checkbox.checked = true;
            }
          });

          deshabilitar();
          $('#not1').css('display','none');
          $('#not2').css('display','block');
        },
    error: function(data) {
      alert('error');
    }
  });         
});

//boton eliminar de la tabla 
$(document).on('click','.btn-asignar',function(){
    $('#responsableId').val('');
    $('#responsable').val('');
    var id = $(this).parent().parent().attr("id");
    $("#asignarModal").modal("show");
    $('#btnAsignar').attr("iddelet",id);   
});
//boton aceptar del modal eliminar
$("#btnAsignar").on('click',function(){
  var idSolicitud = $('#btnAsignar').attr("iddelet");
  var idResponsable = $('#responsableId').val();
  var datas={
  "idSolicitud": idSolicitud,
  "idResponsable": idResponsable
  };
  $.ajax({
    type: "POST",
    url: app_base_url + "AsignarSolicitud",
    data: datas, 
    dataType: "json",
    success: function(data){
      if(data){
    toastr.success("Asignado Con Exito");
    }else{
    toastr.error("Fallo al Asignar");
    }
    $("#asignarModal").modal("hide");
    cargarTabla();
    },
    error: function(data) {
      alert('error');
    }
  });
});
function AutoComplete(){
    $.ajax({
    type: "POST",
    url: app_base_url + "AutocompleteResponsable",
    dataType: "json",
    success: function(data){
      txtautocomplete(data);
    },
    error: function(data) {
      toastr.error("Fallo");
    }
  });
}
function txtautocomplete(data){
    var availableTags = data;
    $('#responsable').autocomplete({
    source: availableTags,
    select: function (event, ui) {
        $('#responsable').val(ui.item.label); 
        $("#responsableId").val(ui.item.value); 
        return false;
    }
  });
}

function deshabilitar(){
  document.getElementById("pacienter").disabled = true;
  document.getElementById("fechar").disabled = true;
  document.getElementById("muestrar").disabled = true;
  document.getElementById("observacionesr").disabled = true;

  document.getElementById("paciente").disabled = true;
  document.getElementById("fecha").disabled = true;
  document.getElementById("muestra").disabled = true;
  document.getElementById("observaciones").disabled = true;

  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].disabled = true;
  }
}

function abilitar(){

  document.getElementById("pacienter").disabled = false;
  document.getElementById("fechar").disabled = false;
  document.getElementById("muestrar").disabled = false;
  document.getElementById("observacionesr").disabled = false;

  document.getElementById("paciente").disabled = false;
  document.getElementById("fecha").disabled = false;
  document.getElementById("muestra").disabled = false;
  document.getElementById("observaciones").disabled = false;

  // Habilitar todos los elementos de checkbox
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].disabled = false;
  }
}
