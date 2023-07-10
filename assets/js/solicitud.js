var _idnew = 0;
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
    url: app_base_url +"GetSolicitud",
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
        <a class="boton-op btn-editComp" title="Editar" style="cursor: hand;cursor:pointer">
              <span class="fa fa-list"></span>
              
            </a>
             <a class="boton-op btn-result" title="Resultado" style="cursor: hand;cursor:pointer;">
              <span class="fa fa-check-circle"></span>
              
            </a>
            <a class="boton-op btn-deletComp" title="Eliminar" style="cursor: hand;cursor:pointer;">
              <span class="fa fa-trash"></span>
              
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
//Boton agregar
$( "#btnAgregar" ).on( "click", function() {
    $('#not2').css('display','block');
    $('#not1').css('display','none');
    limpiar();
    abilitar();
    document.getElementById("btnAddComp").removeAttribute("data-idcom"); 
    var boton = document.getElementById('btnAddComp');
    boton.style.visibility = 'visible';
});
//Boton guardar detalle
$( "#btnAddComp" ).on( "click", function(){
  
  
  var idcom = $("#btnAddComp").attr("data-idcom");

  var paciente = $("#paciente").val();
  var fecha = $("#fecha").val();
  var muestra    = $('#muestra').val();
  var observaciones   = $('#observaciones').val();

  const checkboxes = document.querySelectorAll('input[type="checkbox"]');
  const detalle = [];

  
  checkboxes.forEach(checkbox => {
    if (checkbox.checked) {
      detalle.push(checkbox.id);
    }
  });

  
  if(paciente == ''){
    toastr.error('Agregar Nombre del Paciente');
    return;
  }
  if(fecha == ''){
    toastr.error('Agregar Fecha');
    return;
  }
  if(muestra == '' || muestra == null ){
    toastr.error('Agregar Responsable de Muestra');
    return;
  }

  if(detalle == '' || detalle == null ){
    toastr.error('Agregar Analisis');
    return;
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
        $('#not2').css('display','none');
        $('#not1').css('display','block'); 
      },
      error: function(res){
          toastr.error(res.mensaje,'Error', {timeOut: 3000});        
      }
    });
  }else{
    
      
    var datas={
      "id": idcom,
      "paciente": paciente,
      "fecha": fecha,
      "muestra": muestra,
      "observaciones": observaciones,
      "detalle": detalle
    };
    $.ajax({
      type: "POST",
      url: app_base_url +"EditSolicitud",
      data: datas,
      dataType: "json",
      success: function (res) {
        if(res){
          toastr.success("Editado Con Exito");
          cargarTabla();
          $('#not2').css('display','none');
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
$( "#btnCancelaredit" ).on( "click", function() {
    $('#not2').css('display','none');
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
  var boton = document.getElementById('btnAddComp');

    boton.style.visibility = 'visible';

  if(estado != 'Pendiente'){
    boton.style.visibility = 'hidden';
  }
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

$(document).on('click','.btn-result',function(){
  limpiar()
  var id = $(this).parent().parent().attr("id");
  var estado = $(this).closest('tr').find('td:eq(3)').text();

  if(estado != 'Completado'){
    toastr.error('La solicitud no tiene resultados');
    return;
  }
  deshabilitar();
  var datas={
  "id": id
  };
  $.ajax({
    type: "POST",
    url:app_base_url + "GetResultadoId",
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
                        '<textarea class="form-control" id="' + element.id + '" rows="2">' + element.resultado + '</textarea>' +
                        '<button type="button" class="btn btn-info" onclick="miFuncion(' + element.id + ')">Ver Imagen</button>' +
                      '</div>';
            });
            
            html += '</div>';
          });

          
          document.getElementById('container').innerHTML = html;

          $('#not1').css('display','none');
          $('#not2').css('display','none');
          $('#not3').css('display','block');
        },
    error: function(data) {
      alert('error');
    }
  });         
});

//boton eliminar de la tabla
$(document).on('click','.btn-deletComp',function(){
    var id = $(this).parent().parent().attr("id");
    var estado = $(this).closest('tr').find('td:eq(3)').text();
    var boton = document.getElementById('btnAddComp');

      boton.style.visibility = 'visible';

    if(estado != 'Pendiente'){
      toastr.error('La Solicitud ya esta Iniciada');
    }else{
      $("#modaladvertencia").modal("show");
      $('#btndeletComp').attr("iddelet",id); 
    }
});
//boton aceptar del modal eliminar
$("#btndeletComp").on('click',function(){
  var id = $('#btndeletComp').attr("iddelet");
  var datas={
  "id": id
  };
  $.ajax({
    type: "POST",
    url: app_base_url + "DeleteSolicitud",
    data: datas, 
    dataType: "json",
    success: function(data){
      if(data){
    toastr.success("Eliminado Con Exito");
    }else{
    toastr.error("Fallo al Eliminar");
    }
    $("#modaladvertencia").modal("hide");
    cargarTabla();
    },
    error: function(data) {
      alert('error');
    }
  });
});

function miFuncion(id) {
  $("#modalImagen").modal("show");
  _idSolicitudDetalle = id;

  var datas={
  "id": id
  };
  $.ajax({
    type: "POST",
    url: app_base_url + "GetImages",
    data: datas, 
    dataType: "json",
    success: function(data){
      urls = data;

      var galeriaImg = document.getElementById('galeria');
      var listaImagenes = document.getElementById('listaImagenes');
      listaImagenes.innerHTML = '';
      galeriaImg.src ='';

      // Generar los elementos <li> con las imágenes
      if (urls.length > 0) {
        
        galeriaImg.src = urls[0].image_path;

        
        
        for (var i = 0; i < urls.length; i++) {
          var li = document.createElement('li');
          var a = document.createElement('a');
          var img = document.createElement('img');
          img.src = urls[i].image_path;
          img.alt = '';
          img.classList.add('imagen-galeria');
          a.setAttribute('onclick', 'cargarfoto("' + urls[i].image_path + '")');
          a.appendChild(img);
          li.appendChild(a);
          listaImagenes.appendChild(li);
        }
      }else{
        toastr.error("No existen Imagenes");
      }
      },
    error: function(data) {
      alert('error');
    }
  });
  
}

function cargarfoto(img){
document.getElementById("galeria").src=img;
}

//boton aceptar del modal eliminar
$("#btnReport").on('click',function(){
  var datas={
  "idClinica": 0,
  "idAnalisis": 0
  };
  $.ajax({
    type: "POST",
    url: app_base_url + "GetReporte",
    data: datas, 
    dataType: "json",
    success: function(data){
      datos = data;
    },
    error: function(data) {
      alert('error');
    }
  });
});

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

  
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].disabled = false;
  }
}

