var _idnew = 0;
var _idSolicitudDetalle;
$(function() {
    cargarTabla();
});
//Carga la tabla
function cargarTabla() {
  var funcion = "TraerComp";
  var datas={
    "function": funcion
  };
  $.ajax({
    type: "POST",
    url: app_base_url +"GetSolicitudR",
    data: datas, 
    dataType: "json",
    success: function(data){


    $("#tblComList").html("");
    for(var i=0; i<data.length; i++){

    const fechaFormateada = new Date(data[i].fecha).toLocaleDateString('es-ES');

    var tr = `<tr id = "`+data[i].id+`">
      <td>`+data[i].paciente+`</td>
      <td>`+fechaFormateada+`</td>
      <td>`+data[i].muestra+`</td>
      <td>`+data[i].estado+`</td>
      <td>
        <a class="boton-op btn-editComp" title="Ver" style="cursor: hand;cursor:pointer">
              <span class="fa fa-eye"></span>
              
            </a>

            <a class="boton-op btn-result" title="Agregar Resultado" style="cursor: hand;cursor:pointer;">
              <span class="fa fa-list"></span>
              
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

//Boton guardar detalle 
$( "#btnAddResult" ).on( "click", function(){
  
  var idcom = $("#btnAddResult").attr("data-idcom");

  var textareas = document.querySelectorAll('textarea');
  var array = [];
  var todosNoVacios = true;

  textareas.forEach(function(textarea) {
    var id = textarea.id;
    var valor = textarea.value;
    
    if (valor === '') {
      todosNoVacios = false;
      return;
    }
    
    var elemento = { id: id, valor: valor };
    array.push(elemento);
  });

  if (todosNoVacios) {
    console.log(array);
  } else {
    toastr.error('Llenar todos los resultados'); 
  }

  if(idcom==undefined){
           
    var datas={
      "paciente": paciente,
      "fecha": fecha,
      "muestra": muestra,
      "observaciones": observaciones,
      "detalle": detalle
    };

    $.ajax({
      type: "POST",
      url: app_base_url +"SaveSolicitud",
      data: datas,
      success: function (res) {

        var idS = res;
        toastr.success("Guardado Con Exito");
        cargarTabla();
        $('#not3').css('display','none');
        $('#not1').css('display','block'); 
      },
      error: function(res){
          toastr.error(res.mensaje,'Error', {timeOut: 3000});        
      }
    });
  }else{
    
      
    var datas={
      "id": idcom,
      "data": array
    };
    $.ajax({
      type: "POST",
      url: app_base_url +"SaveResultado",
      data: datas,
      dataType: "json",
      success: function (res) {
        if(res){
          toastr.success("Agregado Con Exito");
          cargarTabla();
          $('#not3').css('display','none');
          $('#not1').css('display','block');
        }else{
          toastr.error("Fallo al Editar");
        }
      },
      error: function(res){
          toastr.error(res.mensaje,'Error', {timeOut: 3000});        
      }    
    });
  }  
});
//Boton cancelar para volver a la tabla 
$( "#btnCancelarver" ).on( "click", function() {
    $('#not2').css('display','none');
    $('#not3').css('display','none');
    $('#not1').css('display','block'); 
});
$( "#btnCancelarresult" ).on( "click", function() {
    $('#not2').css('display','none');
    $('#not3').css('display','none');
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
          $("#btnAddResult").attr("data-idcom",id);
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
$(document).on('click','.btn-result',function(){
  limpiar()
  document.getElementById("pacienter").disabled = true;
  document.getElementById("fechar").disabled = true;
  document.getElementById("muestrar").disabled = true;
  document.getElementById("observacionesr").disabled = true;

  document.getElementById("paciente").disabled = true;
  document.getElementById("fecha").disabled = true;
  document.getElementById("muestra").disabled = true;
  document.getElementById("observaciones").disabled = true;

  var id = $(this).parent().parent().attr("id");
  var estado = $(this).closest('tr').find('td:eq(3)').text();

  if(estado != 'Iniciado'){
    toastr.error('Ya se agregaron Resultados a esta Solicitud');
    return;
  }

  var datas={
  "id": id
  };
  $.ajax({
    type: "POST",
    url:app_base_url + "GetSolicitudIdR",
    data: datas, 
    dataType: "json",
    success: function(data){

          var id = data[0].id;
          $("#btnAddResult").attr("data-idcom",id);
          $('#pacienter').val(data[0].paciente);
          $('#fechar').val(data[0].fecha);
          $('#muestrar').val(data[0].muestra);
          $('#observacionesr').val(data[0].observaciones);

          var html = '';
          var categorias = [];

          // Obtener todas las categorías
          data[1].forEach(function(element) {
            if (!categorias.includes(element.categoria)) {
              categorias.push(element.categoria);
            }
          });

          
          categorias.forEach(function(categoria) {
            html += '<div class="container">' +
                      '<h5>' + categoria + '</h5>';
            
            
            var elementosCategoria = data[1].filter(function(element) {
              return element.categoria === categoria;
            });
            
            elementosCategoria.forEach(function(element) {
              html += '<div class="form-group">' +
                        '<label for="' + element.id + '">' + element.analisis + '</label>' +
                        '<textarea class="form-control" id="' + element.id + '" rows="2"></textarea>' +
                        '<button type="button" class="btn btn-info" onclick="miFuncion(' + element.id + ')">Agregar Imagen</button>' +
                      '</div>';
            });
            
            html += '</div>';
          });

          // Agregar el HTML generado al documento
          document.getElementById('container').innerHTML = html;

          $('#not1').css('display','none');
          $('#not3').css('display','block');
        },
    error: function(data) {
      alert('error');
    }
  });         
});

function uploadImages() {
  var files = document.getElementById('fileInput').files;
  
  if (files.length > 0) {
    var id = _idSolicitudDetalle;
  
    var formData = new FormData();
    for (var i = 0; i < files.length; i++) {
      formData.append("files[]", files[i]);
    }
    formData.append("id", id);
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", app_base_url+"SaveImage", true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        alert("Las imágenes se han subido correctamente.");
      } else {
        alert("Ha habido un error al subir las imágenes.");
      }
    };
    xhr.send(formData); 
  } else {
    toastr.success("Seleccione al menos una imagen.");
  }
}



function miFuncion(id) {
  var fileInput = document.getElementById("fileInput");
    fileInput.value = null;
  $("#modalImagen").modal("show");
  _idSolicitudDetalle = id;
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








